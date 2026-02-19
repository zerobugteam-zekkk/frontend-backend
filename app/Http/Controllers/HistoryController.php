<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        // Cek apakah file ada
        if (!Storage::exists('history.json')) {
            return abort(404, 'File history.json tidak ditemukan');
        }

        // Ambil isi file
        $json = Storage::get('history.json');

        // Decode JSON ke array
        $data = json_decode($json, true);

        // Kirim ke view
        return view('sejarah', compact('data'));
    }
}
