<?php

use App\Http\Controllers\Hotel\HotelController;
use Illuminate\Support\Facades\Route;

Route::apiResource('hotels', HotelController::class);

