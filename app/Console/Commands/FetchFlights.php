<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Flight;
use App\Services\FlightService;

class FetchFlights extends Command
{
    protected $signature = 'app:fetch-flights';
    protected $description = 'Fetch flight data from AviationStack and store to database';

    public function handle(FlightService $flightService)
    {
        $this->info('Fetching flights...');

        // Hapus data lama hari ini
        Flight::whereDate('flight_date', today())->delete();

        foreach (['departure', 'arrival'] as $type) {
            $flights = $flightService->getFlightsFromAPI('MLG', $type);

            if ($flights->isEmpty()) {
                $this->warn("No {$type} flights found.");
                continue;
            }

            foreach ($flights as $f) {
                Flight::create([
                    'flight_number' => $f['flight'],
                    'airline'       => $f['airline'],
                    'type'          => $type,
                    'city'          => $f['city'],
                    'time'          => $f['time'],
                    'gate'          => $f['gate'] ?? '-',
                    'status'        => $f['status'],
                    'flight_date'   => today(),
                ]);
            }

            $this->info("Saved " . count($flights) . " {$type} flights.");
        }

        $this->info('Done!');
    }
}
