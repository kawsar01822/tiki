<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create(['name' => 'Dhaka']);
        Location::create(['name' => 'Chittagong']);
        Location::create(['name' => 'Comilla']);
        Location::create(['name' => "Cox's Bazar"]);
    }
}
