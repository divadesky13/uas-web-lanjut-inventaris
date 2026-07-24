<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Profile (Agar tombol "Profil Saya" bisa diklik)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Barang (Dapat diakses Admin dan User)
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/pdf', [BarangController::class, 'exportPdf'])->name('barang.pdf');

    // Route khusus Admin (Tambah/Update/Hapus & Kelola Pengguna)
Route::middleware(['role:admin'])->group(function () {
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Route Kelola Pengguna
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});
});

require __DIR__.'/auth.php';