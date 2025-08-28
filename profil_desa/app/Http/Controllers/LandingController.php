<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Berita;
use App\Models\Admin\Info;
use App\Models\Admin\Sambutan;
use App\Models\Admin\Galeri;
use App\Models\AparatDesa; // <-- 1. Tambahkan impor untuk Model AparatDesa

class LandingController extends Controller
{
    public function landing()
    {
        $kontens = Berita::latest()->take(5)->get();

        $slides = $kontens->map(function ($konten) {
            $gambarTambahan = is_string($konten->gambar)
                ? json_decode($konten->gambar, true)
                : $konten->gambar;

            $gambarTambahan = is_array($gambarTambahan) ? $gambarTambahan : [];

            $gambarUtama = $gambarTambahan[0] ?? $konten->cover;

            return [
                'title' => $konten->judul,
                'image' => asset('storage/' . $gambarUtama),
            ];
        });

        $sambutan = Sambutan::first();
        $infos = Info::latest()->get();

        $galeris = Galeri::latest()->get();
        $videos = $galeris->where('tipe', 'video')->values();
        $images = $galeris->where('tipe', 'gambar')->values();

        $aparatur = AparatDesa::latest()->get();

        return view('welcome', compact('kontens', 'slides', 'sambutan', 'infos', 'images', 'videos', 'galeris', 'aparatur'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->get();
        $videos = $galeris->where('tipe', 'video')->values();
        $images = $galeris->where('tipe', 'gambar')->values();
        return view('galeri', compact('galeris', 'videos', 'images'));
    }

    public function kondisiumum()
    {
        return view('kondisiumum');
    }

    public function kondisisosial()
    {
        return view('kondisisosial');
    }

    public function keadaanekonomi()
    {
        return view('keadaanekonomi');
    }

    public function kelembagaandesa()
    {
        return view('kelembagaandesa');
    }

    public function isustrategis()
    {
        return view('isustrategis');
    }

    public function program()
    {
        return view('program');
    }

    public function produk()
    {
        return view('produk');
    }

    public function produkunggulan()
    {
        return view('produkunggulan');
    }

    public function berita()
    {
        $kontens = Berita::latest()->paginate(6);

        return view('berita', compact('kontens'));
    }
    public function showberita($id)
    {
        $kontens = Berita::with('user')->findOrFail($id);

        // Tambah 1 ke jumlah dibaca
        $kontens->increment('dibaca');

        return view('berita.show', compact('kontens'));
    }

    public function sejarah()
    {
        return view('sejarah');
    }
}