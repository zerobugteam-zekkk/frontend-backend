<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/jadwal', function () {
    return view('jadwal');
})->name('jadwal');

Route::get('/info-umum', function () {
    return view('info'); 
})->name('info');
Route::get('/transportasi', function () {
    return view('transportasi');
})->name('transportasi');
Route::get('/sejarah', function () { return view('sejarah'); });
Route::get('/routes', function () {
    return view('routes');
});
Route::get('/info-parkir', function () {
    return view('parkir');
});
Route::get('/bantuan', function () {
    return view('bantuan');
});
Route::get('/panduan-checkin', function () {
    return view('panduan-checkin');
});
Route::get('/keamanan', function () {
    return view('prosedur-keamanan');
});
Route::get('/layanan-cargo', function () {
    return view('layanan-cargo');
});