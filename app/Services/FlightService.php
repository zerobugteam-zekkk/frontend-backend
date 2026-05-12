<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Cache;
use App\Models\Flight;

class FlightService
{
    // =========================
    // AMBIL DARI DATABASE (dipakai chatbot)
    // =========================
    public function getFlights(string $airport = 'MLG', string $type = 'departure')
    {
        $flights = Flight::where('type', $type)
            ->whereDate('flight_date', today())
            ->orderBy('time')
            ->get(['time', 'city', 'airline', 'flight_number as flight', 'gate', 'status', 'flight_number']);

        // Kalau DB kosong (belum ada data hari ini), fallback ke API langsung
        if ($flights->isEmpty()) {
            return $this->getFlightsFromAPI($airport, $type);
        }

        return $flights;
    }

    // =========================
    // AMBIL DARI API (dipakai cron job FetchFlights)
    // =========================
    public function getFlightsFromAPI(string $airport = 'MLG', string $type = 'departure')
    {
        $params = [
            'access_key' => config('services.aviationstack.key'),
            'limit'      => 20,
        ];

        if ($type === 'departure') {
            $params['dep_iata']     = $airport;
            $params['arr_country']  = 'ID';
        } else {
            $params['arr_iata']     = $airport;
            $params['dep_country']  = 'ID';
        }

        $response = Http::get(
            config('services.aviationstack.url') . '/flights',
            $params
        );

        if (!$response->successful()) {
            return collect();
        }

        return collect($response->json('data'))->map(function ($flight) use ($type) {
            $seg = $type === 'departure'
                ? $flight['departure']
                : $flight['arrival'];

            return [
                'time'    => substr($seg['scheduled'] ?? '00:00', 11, 5),
                'city'    => $type === 'departure'
                    ? ($flight['arrival']['airport'] ?? '-')
                    : ($flight['departure']['airport'] ?? '-'),
                'airline' => $flight['airline']['name'] ?? '-',
                'flight'  => $flight['flight']['iata'] ?? '-',
                'gate'    => $seg['gate'] ?? '-',
                'status'  => strtoupper($flight['flight_status'] ?? 'SCHEDULED'),
            ];
        })
        ->sortBy('time')
        ->values();
    }

    // =========================
    // HITUNG PENERBANGAN HARI INI (dari DB)
    // =========================
    public function getTodayFlightsCount(string $iata = 'MLG'): int
    {
        return Flight::where('type', 'departure')
            ->whereDate('flight_date', today())
            ->count();
    }

    // =========================
    // ESTIMASI PENUMPANG
    // =========================
    public function estimatePassengers(string $iata = 'MLG'): int
    {
        return $this->getTodayFlightsCount($iata) * 80;
    }

    // =========================
    // RAW COUNT (fallback ke API kalau DB kosong)
    // =========================
    public function getTodayFlightsRaw(string $iata = 'MLG'): int
    {
        $count = $this->getTodayFlightsCount($iata);

        if ($count > 0) {
            return $count;
        }

        // Fallback ke API
        $response = Http::get(config('services.aviationstack.url') . '/flights', [
            'access_key' => config('services.aviationstack.key'),
            'dep_iata'   => $iata,
            'limit'      => 100,
        ]);

        if (!$response->successful()) {
            return 0;
        }

        $today = now()->toDateString();

        return collect($response->json('data'))->filter(function ($flight) use ($today) {
            $scheduled = data_get($flight, 'departure.scheduled');
            return $scheduled && str_starts_with($scheduled, $today);
        })->count();
    }
}
