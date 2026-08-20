<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Services\FonnteService;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [PelangganController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/pesanan/create', [PesananController::class, 'create'])
        ->name('pesanan.create');

    Route::post('/pesanan', [PesananController::class, 'store'])
        ->name('pesanan.store');

    Route::get('/pesanan', [PesananController::class, 'index'])
        ->name('pesanan.index');

    Route::get('/pesanan/{pesanan}', [PesananController::class, 'show'])
        ->name('pesanan.show');
});
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
