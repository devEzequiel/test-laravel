<?php

use App\Http\Controllers\Room\RoomController;
use Illuminate\Support\Facades\Route;

Route::prefix('rooms')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
    Route::post('/', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('{room}', [RoomController::class, 'show'])->name('rooms.show');
    Route::put('{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
});
