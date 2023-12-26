<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeatAllocation;
use App\Models\Trip;

class SeatAllocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = Trip::all();

        foreach ($trips as $trip) {
            // Allocate some random seats for each trip
            $seatsToAllocate = array_rand(range(1, 36), rand(5, 15));

            foreach ($seatsToAllocate as $seatNumber) {
                SeatAllocation::create([
                    'trip_id' => $trip->id,
                    'seat_number' => $seatNumber + 1, // Array keys are zero-based
                    'user_name' => 'Passenger ' . rand(1, 100),
                ]);
            }
        }
    }
}
