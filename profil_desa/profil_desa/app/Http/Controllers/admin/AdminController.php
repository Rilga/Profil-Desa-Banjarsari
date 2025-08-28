<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Berita;
use App\Models\Admin\Galeri;
use App\Models\AparatDesa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $jumlahBerita = Berita::count();
        $jumlahGaleri = Galeri::count();
        $jumlahAparat = AparatDesa::count();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'jumlahBerita',
            'jumlahGaleri',
            'jumlahAparat',
            'beritaTerbaru'
        ));
    }
}
