<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Komunitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KomunitasController extends Controller
{
    public function index()
    {
        $kontens = Komunitas::where('user_id', Auth::id())->latest()->get();
        return view('user.komunitas.index', compact('kontens'));
    }

    public function create()
    {
        return view('user.komunitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $coverPath = $request->file('cover')->store('komunitas/cover', 'public');

        $gambarTambahan = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $gambarTambahan[] = $gambar->store('komunitas/gambar', 'public');
            }
        }

        Komunitas::create([
            'user_id' => Auth::id(),
            'cover' => $coverPath,
            'gambar' => json_encode($gambarTambahan), // disimpan ke kolom `gambar`
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul . '-' . uniqid()),
            'status' => 'pending',
        ]);

        return redirect()->route('user.komunitas')->with('success', 'Konten berhasil dikirim dan menunggu persetujuan.');
    }

    public function show($id)
    {
        $konten = Komunitas::where('id', $id)->firstOrFail();
        $konten->increment('dibaca');

        return view('user.komunitas.show', compact('konten'));
    }

    public function edit($id)
    {
        $konten = Komunitas::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('user.komunitas.edit', compact('konten'));
    }

    public function update(Request $request, $id)
    {
        $konten = Komunitas::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($konten->cover && Storage::disk('public')->exists($konten->cover)) {
                Storage::disk('public')->delete($konten->cover);
            }
            $konten->cover = $request->file('cover')->store('komunitas/cover', 'public');
        }

        $gambarTambahan = json_decode($konten->gambar, true) ?? [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $gambarTambahan[] = $gambar->store('komunitas/gambar', 'public');
            }
        }

        $konten->judul = $request->judul;
        $konten->deskripsi = $request->deskripsi;
        $konten->gambar = json_encode($gambarTambahan); // ubah ke kolom `gambar`
        $konten->status = 'pending'; // reset status
        $konten->save();

        return redirect()->route('user.komunitas')->with('success', 'Konten berhasil diperbarui dan menunggu persetujuan.');
    }

    public function destroy($id)
    {
        $konten = Komunitas::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($konten->cover && Storage::disk('public')->exists($konten->cover)) {
            Storage::disk('public')->delete($konten->cover);
        }

        $gambarTambahan = json_decode($konten->gambar, true) ?? [];
        foreach ($gambarTambahan as $gambar) {
            if (Storage::disk('public')->exists($gambar)) {
                Storage::disk('public')->delete($gambar);
            }
        }

        $konten->delete();

        return redirect()->route('user.komunitas')->with('success', 'Konten berhasil dihapus.');
    }
}
