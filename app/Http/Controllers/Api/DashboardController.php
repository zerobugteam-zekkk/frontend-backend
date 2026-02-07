<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FlightService;

class DashboardController extends Controller
{
        public function stats(FlightService $flightService)
    {
        return response()->json([
            'flights_today' => $flightService->getTodayFlightsRaw('MLG'),
            'estimated_passengers' => $flightService->estimatePassengers('MLG'),
            'runway' => '17/35',
            'security_status' => 'Aktif',
        ]);
    }
}
