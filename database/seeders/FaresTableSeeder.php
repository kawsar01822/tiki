<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fare;
use App\Models\Location;

class FaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = Location::all();

        // Sample fare amounts for different routes
        $fareData = [
            ['origin' => 1, 'destination' => 2, 'amount' => 600],
            ['origin' => 1, 'destination' => 3, 'amount' => 800],
            ['origin' => 1, 'destination' => 4, 'amount' => 1000],
            ['origin' => 2, 'destination' => 3, 'amount' => 700],
            ['origin' => 2, 'destination' => 4, 'amount' => 900],
            ['origin' => 3, 'destination' => 4, 'amount' => 750],
            // Add more fare data as needed
        ];

        foreach ($fareData as $fareInfo) {
            $origin = $locations->find($fareInfo['origin']);
            $destination = $locations->find($fareInfo['destination']);

            if ($origin && $destination) {
                Fare::create([
                    'origin_id' => $origin->id,
                    'destination_id' => $destination->id,
                    'amount' => $fareInfo['amount'],
                ]);
            }
        }
    }
}
