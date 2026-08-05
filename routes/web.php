<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Services\FonnteService;

Route::get('/test-wa', function () {

    FonnteService::send(
        '6285269060494',
        'Tes notifikasi laundry Laravel'
    );

    return 'terkirim';
});

/*
|--------------------------------------------------------------------------
| Frontend Pelanggan
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan');

/*
|--------------------------------------------------------------------------
| Dashboard Pelanggan
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [PelangganController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('/pesanan/create', function () {
    return 'Halaman Form Pesanan (Coming Soon)';
})->name('pesanan.create');
/*
|--------------------------------------------------------------------------
| Profile Breeze
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
