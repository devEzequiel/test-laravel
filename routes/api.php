<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    require_once 'modules/hotel.php';
    require_once 'modules/room.php';
});
