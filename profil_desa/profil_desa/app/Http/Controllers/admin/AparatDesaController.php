<?php

// app/Http/Controllers/Admin/AparatDesaController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AparatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AparatDesaController extends Controller
{
    public function index()
    {
        $aparatur = AparatDesa::latest()->paginate(10);
        return view('admin.aparat.index', compact('aparatur'));
    }

    public function create()
    {
        return view('admin.aparat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto-aparat', 'public');
        }

        AparatDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $path,
        ]);

        return redirect()->route('admin.aparat.index')->with('success', 'Data Aparat Desa berhasil ditambahkan.');
    }

    public function edit(AparatDesa $aparat)
    {
        return view('admin.aparat.edit', compact('aparat'));
    }

    public function update(Request $request, AparatDesa $aparat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $aparat->foto;
        if ($request->hasFile('foto')) {
            if ($aparat->foto) {
                Storage::delete($aparat->foto);
            }
            $path = $request->file('foto')->store('foto-aparat', 'public');
        }

        $aparat->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $path,
        ]);

        return redirect()->route('admin.aparat.index')->with('success', 'Data Aparat Desa berhasil diperbarui.');
    }

    public function destroy(AparatDesa $aparat)
    {
        // Hapus foto dari storage
        if ($aparat->foto) {
            Storage::delete($aparat->foto);
        }

        $aparat->delete();

        return redirect()->route('admin.aparat.index')->with('success', 'Data Aparat Desa berhasil dihapus.');
    }
}