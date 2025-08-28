<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\LandingController;

// User Controllers
use App\Http\Controllers\user\UserController;

// Admin Controllers
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\DataLandingController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\AparatDesaController;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('/kondisi-umum', [LandingController::class, 'kondisiumum'])->name('kondisiumum');
Route::get('/kondisi-sosial', [LandingController::class, 'kondisisosial'])->name('kondisisosial');
Route::get('/keadaan-ekonomi', [LandingController::class, 'keadaanekonomi'])->name('keadaanekonomi');
Route::get('/kelembagaan-desa', [LandingController::class, 'kelembagaandesa'])->name('kelembagaandesa');
Route::get('/isu-strategis', [LandingController::class, 'isustrategis'])->name('isustrategis');
Route::get('/galeri', [LandingController::class, 'galeri'])->name('user.galeri');
Route::get('/program', [LandingController::class, 'program'])->name('user.program');
Route::get('/produk', [LandingController::class, 'produk'])->name('user.produk');
Route::get('/produkunggulan', [LandingController::class, 'produkunggulan'])->name('user.produkunggulan');
Route::get('/berita', [LandingController::class, 'berita'])->name('user.berita');
Route::get('/berita/{id}', [LandingController::class, 'showberita'])->name('user.berita.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    // Rute CRUD Berita
    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{berita}', [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::get('/admin/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // Rute CRUD Galeri
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/admin/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/admin/galeri/{galeri}', [GaleriController::class, 'show'])->name('admin.galeri.show');
    Route::get('/admin/galeri/{galeri}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/admin/galeri/{galeri}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    Route::get('/sambutan/edit', [DataLandingController::class, 'index'])->name('admin.datalandingpage');
    Route::post('/sambutan/update', [DataLandingController::class, 'update'])->name('admin.sambutan.update');
    Route::post('/info/store-or-update', [DataLandingController::class, 'storeOrUpdateinfo'])->name('admin.info.storeOrUpdate');
    Route::delete('/info/{id}', [DataLandingController::class, 'destroyinfo'])->name('admin.info.destroy');

    // Rute CRUD Aparat Desa
    Route::resource('/admin/aparat', AparatDesaController::class)->names('admin.aparat');
});
