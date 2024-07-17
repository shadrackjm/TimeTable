<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Venue::create(['name' => 'Room A']);
        // Venue::create(['name' => 'Room B']);
        // Venue::create(['name' => 'Room C']);
        // Venue::create(['name' => 'Room D']);
        // Venue::create(['name' => 'Room E']);
        // Venue::create(['name' => 'Room F']);

        Venue::create(['name' => 'Room G']);
        Venue::create(['name' => 'Room H']);
        Venue::create(['name' => 'Room I']);
        Venue::create(['name' => 'Room J']);
        Venue::create(['name' => 'Room K']);
        Venue::create(['name' => 'Room L']);
    }
}
