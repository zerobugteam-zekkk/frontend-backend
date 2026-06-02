<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\ChatbotController;
use App\Http\Controllers\Api\DashboardController;

Route::get('/test', fn() => 'API OK');
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/dashboard/stats', [DashboardController::class, 'stats']);

// Chatbot — pakai session tapi tetap di api.php (tidak ada CSRF)
// Route::middleware(\Illuminate\Session\Middleware\StartSession::class)
//     ->group(function () {
        Route::post('/chat',          [ChatbotController::class, 'chat']);
        Route::post('/chat/register', [ChatbotController::class, 'register']);
        Route::post('/chat/logout',   [ChatbotController::class, 'logout']);
    //});
