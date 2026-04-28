<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FlightService
{
    // Mendapatkan data penerbangan dari API dengan caching
    public function getFlights(string $airport = 'MLG', string $type = 'departure')
    {
        $cacheKey = "flights_{$airport}_{$type}";

        $cached = Cache::get($cacheKey);
        if ($cached !== null) {
            return $cached;
        }

        $params = [
            'access_key' => config('services.aviationstack.key'),
            'limit' => 20,
        ];

        if ($type === 'departure') {
            $params['dep_iata'] = $airport;
            $params['arr_country'] = 'ID';
        } else {
            $params['arr_iata'] = $airport;
            $params['dep_country'] = 'ID';
        }

        $response = Http::get(
            config('services.aviationstack.url') . '/flights',
            $params
        );

        if (!$response->successful()) {
            return collect();
        }

        $result = collect($response->json('data'))->map(function ($flight) use ($type) {
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

        Cache::put($cacheKey, $result, 86400);

        return $result;
    }
    // Menghitung jumlah penerbangan hari ini dari bandara tertentu
    public function getTodayFlightsCount(string $iata = 'MLG'): int
    {
        $flights = $this->getFlights($iata, 'departure');

        if (!$flights instanceof \Illuminate\Support\Collection) {
            return 0;
        }

        return $flights->count();
    }
    // Mengestimasi jumlah penumpang hari ini berdasarkan jumlah penerbangan
    public function estimatePassengers(string $iata = 'MLG'): int
    {
        // $flights = $this->getTodayFlightsCount($iata);

        // asumsi rata-rata 80 pax / flight
        return $this->getTodayFlightsRaw($iata) * 80;
    }
    // Mendapatkan jumlah penerbangan hari ini secara langsung dari API (cached 24 jam)
    public function getTodayFlightsRaw(string $iata = 'MLG'): int
    {
        $today = now()->toDateString();
        $cacheKey = "flights_raw_{$iata}_{$today}";

        $cached = Cache::get($cacheKey);
        if ($cached !== null) {
            return $cached;
        }

        $response = Http::get(config('services.aviationstack.url') . '/flights', [
            'access_key' => config('services.aviationstack.key'),
            'dep_iata' => $iata,
            'limit' => 100,
        ]);

        if (!$response->successful()) {
            return 0;
        }

        $flights = collect($response->json('data'));

        $count = $flights->filter(function ($flight) use ($today) {
            $scheduled = data_get($flight, 'departure.scheduled');
            return $scheduled && str_starts_with($scheduled, $today);
        })->count();

        Cache::put($cacheKey, $count, 86400);

        return $count;
    }
}
