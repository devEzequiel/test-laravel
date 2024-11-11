<?php

use App\Http\Controllers\Hotel\HotelController;
use Illuminate\Support\Facades\Route;

Route::prefix('hotels')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotels.index');
    Route::post('/', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('{hotel}', [HotelController::class, 'show'])->name('hotels.show');
    Route::put('{hotel}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');
})->middleware('auth:sanctum');
