<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\LandingController;

// User Controllers
use App\Http\Controllers\user\UserController;

// Admin Controllers
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\DataLandingController;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('/visimisi', [LandingController::class, 'visimisi'])->name('visimisi');
Route::get('/berita', [LandingController::class, 'berita'])->name('user.berita');
Route::get('/berita/{id}', [LandingController::class, 'showberita'])->name('user.berita.show');
Route::get('/produkunggulan', [LandingController::class, 'produkunggulan'])->name('produkunggulan');
Route::get('/katalog', [ProductController::class, 'index'])->name('katalog.index');
Route::get('/katalog/{slug}', [ProductController::class, 'show'])->name('katalog.show');


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
    Route::resource('/admin/products', \App\Http\Controllers\admin\ProductController::class)->names('admin.products');


    // Rute CRUD Berita
    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('admin/berita/{berita}', [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::get('admin/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('admin/berita/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('admin/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');



    Route::get('sambutan/edit', [DataLandingController::class, 'index'])->name('admin.datalandingpage');
    Route::post('sambutan/update', [DataLandingController::class, 'update'])->name('admin.sambutan.update');
    Route::post('/info/store-or-update', [DataLandingController::class, 'storeOrUpdateinfo'])->name('admin.info.storeOrUpdate');
    Route::delete('/info/{id}', [DataLandingController::class, 'destroyinfo'])->name('admin.info.destroy');
});