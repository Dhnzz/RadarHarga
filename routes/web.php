<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, BarangController};

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('barang', BarangController::class);
    Route::post('/barang/filter', [BarangController::class, 'filter'])->name('barang.filter');
});
