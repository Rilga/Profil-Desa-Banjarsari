<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\LandingController;

// User Controllers
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\KomunitasController;

// Admin Controllers
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KomunitasApprovalController;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/komunitasview', [LandingController::class, 'komunitasIndex'])->name('komunitas.index');
Route::get('/komunitasview/{id}', [LandingController::class, 'showkomunitas'])->name('landing.komunitas.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/user/komunitas', [KomunitasController::class, 'index'])->name('user.komunitas');
    Route::resource('/komunitas', KomunitasController::class, ['as' => 'user']);
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/komunitas', [KomunitasApprovalController::class, 'index'])->name('admin.komunitas.index');
    Route::get('admin/komunitas/{id}', [KomunitasApprovalController::class, 'show'])->name('komunitas.show');
    Route::patch('/komunitas/{id}/status', [KomunitasApprovalController::class, 'updateStatus'])->name('admin.komunitas.updateStatus');

});
