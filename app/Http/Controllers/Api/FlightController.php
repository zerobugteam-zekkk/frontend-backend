<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $airport = $request->query('airport', 'MLG');
        $type = $request->query('type', 'departure'); // departure | arrival

        $params = [
            'access_key' => config('services.aviationstack.key'),
            'limit' => 20,
        ];

        if ($type === 'departure') {
            $params['dep_iata'] = $airport;
            $params['arr_country'] = 'ID'; // 🇮🇩 domestik
        } else {
            $params['arr_iata'] = $airport;
            $params['dep_country'] = 'ID'; // 🇮🇩 domestik
        }

        $response = Http::get(
            config('services.aviationstack.url') . '/flights',
            $params
        );

        if ($response->failed()) {
            return response()->json([
                'http_status' => $response->status(),
                'aviationstack_response' => $response->json(),
            ], 500);
        }

        $flights = collect($response->json('data'))
            ->map(function ($flight) use ($type) {
                $data = $type === 'departure'
                    ? $flight['departure']
                    : $flight['arrival'];

                return [
                    'time'    => substr($data['scheduled'] ?? '--:--', 11, 5),
                    'city'    => $type === 'departure'
                        ? ($flight['arrival']['airport'] ?? '-')
                        : ($flight['departure']['airport'] ?? '-'),
                    'airline' => $flight['airline']['name'] ?? '-',
                    'flight'  => $flight['flight']['iata'] ?? '-',
                    'gate'    => $data['gate'] ?? '-',
                    'status'  => strtoupper($flight['flight_status'] ?? 'scheduled'),
                ];
            })
            ->values();

        return response()->json([
            'source' => 'AviationStack',
            'airport' => $airport,
            'type' => $type,
            'count' => $flights->count(),
            'data' => $flights,
        ]);
    }
}
