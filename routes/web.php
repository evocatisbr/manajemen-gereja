<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Jemaat\DashboardJemaatController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('dashboard'));

// User profile (semua user login bisa akses)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Dashboard untuk Admin

});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Dashboard khusus ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Admin only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('jemaat', JemaatController::class);
    Route::get('/admin', fn () => view('admin.dashboard'));
});

// Keuangan (admin & bendahara)
Route::middleware(['auth', 'role:admin,bendahara'])->group(function () {
    Route::get('/keuangan/rekap', [KeuanganController::class, 'rekap'])->name('keuangan.rekap');
    Route::resource('/keuangan', KeuanganController::class)->except(['show']);
});

// Pelayan
Route::middleware(['auth', 'role:admin,pelayan'])->group(function () {
    Route::get('/jadwal', fn () => view('jadwal.index'));
});

// Jemaat
Route::middleware(['auth', 'role:admin,jemaat,pelayan,bendahara'])->group(function () {
    Route::get('/profil', fn () => view('profil.index'));
});

require __DIR__.'/auth.php';
