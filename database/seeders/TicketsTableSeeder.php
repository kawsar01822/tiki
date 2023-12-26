<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Trip;
use App\Models\Fare;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = Trip::all();

        foreach ($trips as $trip) {
            // Assuming each trip has 36 seats
            for ($seatNumber = 1; $seatNumber <= 36; $seatNumber++) {
                // Simulate random booking of some seats
                if (rand(0, 1)) {
                    // Retrieve the fare based on origin and destination
                    $fare = Fare::where('origin_id', $trip->origin_id)
                        ->where('destination_id', $trip->destination_id)
                        ->first();

                    // If a specific fare is not found, use a default value
                    $fareAmount = $fare ? $fare->amount : 500;

                    Ticket::create([
                        'trip_id' => $trip->id,
                        'user_name' => 'Passenger ' . rand(1, 100),
                        'seat_number' => $seatNumber,
                        'fare' => $fareAmount,
                    ]);
                }
            }
        }
    }
}
