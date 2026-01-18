<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FlightService
{
    public function getFlights(string $airport = 'MLG', string $type = 'departure')
    {
        $cacheKey = "flights_{$airport}_{$type}";

        return Cache::remember($cacheKey, 600, function () use ($airport, $type) {

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

            return collect($response->json('data'))->map(function ($flight) use ($type) {
                $seg = $type === 'departure'
                    ? $flight['departure']
                    : $flight['arrival'];

                return [
                    'time'    => substr($seg['scheduled'] ?? '--:--', 11, 5),
                    'city'    => $type === 'departure'
                        ? ($flight['arrival']['airport'] ?? '-')
                        : ($flight['departure']['airport'] ?? '-'),
                    'airline' => $flight['airline']['name'] ?? '-',
                    'flight'  => $flight['flight']['iata'] ?? '-',
                    'gate'    => $seg['gate'] ?? '-',
                    'status'  => strtoupper($flight['flight_status'] ?? 'SCHEDULED'),
                ];
            })->values();
        });
    }
}
