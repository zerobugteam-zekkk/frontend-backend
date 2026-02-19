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
        $type    = $request->query('type', 'departure');

        $cacheKey = "flights_{$airport}_{$type}";
        $lockKey  = "lock_{$cacheKey}";

        // 🔥 Kalau cache masih ada → langsung return
        if (Cache::has($cacheKey)) {
            return response()->json(Cache::get($cacheKey));
        }

        try {

            $data = Cache::lock($lockKey, 10)->block(5, function () use ($airport, $type, $cacheKey) {

                // Double check cache setelah lock (penting!)
                if (Cache::has($cacheKey)) {
                    return Cache::get($cacheKey);
                }

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

                $response = Http::timeout(15)->get(
                    config('services.aviationstack.url') . '/flights',
                    $params
                );

                // ⚠️ Kalau API gagal → pakai cache lama kalau ada
                if ($response->failed()) {

                    $oldCache = Cache::get($cacheKey);

                    if ($oldCache) {
                        return $oldCache;
                    }

                    return [
                        'source'  => 'api-error',
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
                            'time'    => substr($segment['scheduled'] ?? '99:99', 11, 5),
                            'city'    => $type === 'departure'
                                ? ($flight['arrival']['airport'] ?? '-')
                                : ($flight['departure']['airport'] ?? '-'),
                            'airline' => $flight['airline']['name'] ?? '-',
                            'flight'  => $flight['flight']['iata'] ?? '-',
                            'gate'    => $segment['gate'] ?? '-',
                            'status'  => strtoupper($flight['flight_status'] ?? 'SCHEDULED'),
                        ];
                    })
                    ->sortBy('time')
                    ->values();

                $result = [
                    'source'     => 'AviationStack',
                    'airport'    => $airport,
                    'type'       => $type,
                    'count'      => $flights->count(),
                    'data'       => $flights,
                    'cached_at'  => now()->format('H:i:s'),
                ];

                // 🔥 Simpan cache 1 jam
                Cache::put($cacheKey, $result, 3600);

                return $result;
            });

            return response()->json($data);

        } catch (\Throwable $e) {

            // Kalau lock gagal atau error lain → fallback cache lama
            $fallback = Cache::get($cacheKey);

            if ($fallback) {
                return response()->json($fallback);
            }

            return response()->json([
                'source'  => 'system-error',
                'airport' => $airport,
                'type'    => $type,
                'count'   => 0,
                'data'    => [],
            ], 500);
        }
    }
}
