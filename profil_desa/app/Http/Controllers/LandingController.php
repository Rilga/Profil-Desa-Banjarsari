<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User\Komunitas;

class LandingController extends Controller
{
    public function landing()
    {
        $kontens = Komunitas::where('status', 'approved')->latest()->get();

        $slides = $kontens->map(function ($konten) {
            $gambarTambahan = json_decode($konten->gambar, true);
            $gambarUtama = $gambarTambahan[0] ?? $konten->cover;

            return [
                'title' => $konten->judul,
                'image' => asset('storage/' . $gambarUtama),
            ];
        });

        return view('welcome', compact('kontens', 'slides'));
    }

    public function komunitasIndex(Request $request)
    {
        $query = Komunitas::where('status', 'approved');

        // Jika ada keyword pencarian
        if ($request->has('q') && $request->q != '') {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%");
            });
        }

        $kontens = $query->latest()->paginate(6);
        return view('komunitas', compact('kontens'));
    }

    public function showkomunitas($id)
    {
        $konten = Komunitas::with('user')->findOrFail($id);
        $konten->increment('dibaca'); // auto tambah 1 view
        return view('komunitas.show', compact('konten'));
    }

}
