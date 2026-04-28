<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Spatie\Sitemap\SitemapGenerator;

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
// Route dengan URL: namadomain.com/jam-operasional
Route::get('/jam-operasional', function () {
    return view('jamoperasional');
})->name('jam.operasional');

// Route untuk mengubah bahasa
Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['id', 'en']), 400);

    session(['locale' => $locale]);

    return redirect()->to(url()->previous() ?: route('home'));
})->name('lang.switch');

// Route for generating sitemap
Route::get('/generate-sitemap', function () {
    SitemapGenerator::create('https://abdurachmansaleh-airport.my.id')
        ->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap generated!';
});
