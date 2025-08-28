<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin\Galeri;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:102400', // max 100MB
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();

            $tipe = in_array(strtolower($ext), ['mp4', 'mov', 'avi']) ? 'video' : 'gambar';
            $filename = Str::random(20) . '.' . $ext;

            $file->storeAs('galeri', $filename, 'public');

            Galeri::create([
                'judul' => $request->input('judul'),
                'file' => $filename,
                'tipe' => $tipe,
            ]);

            return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil ditambahkan!');
        }

        return back()->with('error', 'File tidak berhasil diunggah.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpg,jpeg,png,mp4,mov,avi|max:102400', // opsional jika tidak diubah
        ]);

        $data = ['judul' => $request->input('judul')];

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($galeri->file && Storage::exists('public/galeri/' . $galeri->file)) {
                Storage::delete('public/galeri/' . $galeri->file);
            }

            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $tipe = in_array(strtolower($ext), ['mp4', 'mov', 'avi']) ? 'video' : 'gambar';

            $filename = Str::random(20) . '.' . $ext;
            $file->storeAs('galeri', $filename, 'public');

            $data['file'] = $filename;
            $data['tipe'] = $tipe;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        Storage::delete('public/galeri/' . $galeri->file);
        $galeri->delete();

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil dihapus!');
    }
}
