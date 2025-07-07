<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Komunitas;
use Illuminate\Http\Request;

class KomunitasApprovalController extends Controller
{
    public function index()
    {
        $kontens = Komunitas::with('user')->latest()->get();
        return view('admin.komunitas.index', compact('kontens'));
    }

    public function show($id)
    {
        $konten = Komunitas::with('user')->findOrFail($id);
        return view('admin.komunitas.show', compact('konten'));
    }

    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $konten = \App\Models\User\Komunitas::findOrFail($id);
        $konten->status = $request->status;
        $konten->save();

        return redirect()->route('admin.komunitas.index')->with('success', 'Status berhasil diperbarui.');
    }
}
