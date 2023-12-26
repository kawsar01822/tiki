<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create(['date' => now()->addDays(1), 'origin_id' => 1, 'destination_id' => 2]);
        Trip::create(['date' => now()->addDays(2), 'origin_id' => 2, 'destination_id' => 3]);
        Trip::create(['date' => now()->addDays(3), 'origin_id' => 3, 'destination_id' => 4]);
    }
}
