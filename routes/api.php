<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\ChatbotController;
use App\Http\Controllers\Api\DashboardController;

Route::get('/test', function () {
    return 'API OK';
});


Route::get('/flights', [FlightController::class, 'index']);
Route::post('/chat', [ChatbotController::class, 'chat']);
Route::post('/chat/register', [ChatbotController::class, 'register']);
Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
