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

        // Kalau cache masih ada → langsung return
        $cached = Cache::get($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        try {

            $data = Cache::lock($lockKey, 10)->block(5, function () use ($airport, $type, $cacheKey) {

                // Double check cache setelah lock (penting!)
                $cached = Cache::get($cacheKey);
                if ($cached !== null) {
                    return $cached;
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

                // 🔥 Manual injection (VALID: transit route via Surabaya)
$manualFlights = collect([
    [
        'time'    => '08:00',
        'city'    => 'Surabaya (SUB) → Lombok (LOP)',
        'airline' => 'Batik Air + Wings Air',
        'flight'  => 'ID xxxx / IW xxxx',
        'gate'    => '-',
        'status'  => 'TRANSIT',
        'note'    => 'Transit via SUB (no direct flight available)',
    ],
]);

// 🔍 Cek apakah sudah ada rute ke Lombok
$hasLombok = $flights->contains(function ($f) {
    return str_contains(strtolower($f['city']), 'lombok');
});

// 🚀 Inject hanya kalau memang tidak ada
if (!$hasLombok) {
    $flights = $flights->merge($manualFlights)
        ->sortBy('time')
        ->values();
}

                $result = [
                    'source'     => 'AviationStack',
                    'airport'    => $airport,
                    'type'       => $type,
                    'count'      => $flights->count(),
                    'data'       => $flights,
                    'cached_at'  => now()->format('Y-m-d H:i:s'),
    'expires_at' => now()->addDay()->format('Y-m-d H:i:s'), // ← tambahan
                ];

                // Simpan cache 24 jam
                Cache::put($cacheKey, $result, 86400);

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
