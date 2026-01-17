<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $airport = $request->query('airport', 'MLG');
        $type    = $request->query('type', 'departure'); // departure | arrival

        // 🔑 cache key unik per airport & type
        $cacheKey = "flights_{$airport}_{$type}";

        $data = Cache::remember($cacheKey, 600, function () use ($airport, $type) {

            $params = [
                'access_key' => config('services.aviationstack.key'),
                'limit'      => 20,
            ];

            if ($type === 'departure') {
                $params['dep_iata']    = $airport;
                $params['arr_country'] = 'ID';
            } else {
                $params['arr_iata']    = $airport;
                $params['dep_country'] = 'ID';
            }

            $response = Http::get(
                config('services.aviationstack.url') . '/flights',
                $params
            );

            // ⚠️ jika API gagal (429 / error lain)
            if ($response->failed()) {
                return [
                    'source'  => 'cache-or-dummy',
                    'airport' => $airport,
                    'type'    => $type,
                    'count'   => 0,
                    'data'    => [],
                ];
            }

            $flights = collect($response->json('data'))
                ->map(function ($flight) use ($type) {

                    $segment = $type === 'departure'
                        ? $flight['departure']
                        : $flight['arrival'];

                    return [
                        'time'    => substr($segment['scheduled'] ?? '--:--', 11, 5),
                        'city'    => $type === 'departure'
                            ? ($flight['arrival']['airport'] ?? '-')
                            : ($flight['departure']['airport'] ?? '-'),
                        'airline' => $flight['airline']['name'] ?? '-',
                        'flight'  => $flight['flight']['iata'] ?? '-',
                        'gate'    => $segment['gate'] ?? '-',
                        'status'  => strtoupper($flight['flight_status'] ?? 'SCHEDULED'),
                    ];
                })
                ->values();

            return [
                'source'  => 'AviationStack',
                'airport' => $airport,
                'type'    => $type,
                'count'   => $flights->count(),
                'data'    => $flights,
                'cached_at' => now()->format('H:i:s'),
            ];
        });

        return response()->json($data);
    }
}
