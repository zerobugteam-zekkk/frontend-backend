<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;

Route::get('/test', function () {
    return 'API OK';
});


Route::get('/flights', [FlightController::class, 'index']);
