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
        Venue::create(['name' => 'Room A']);
        Venue::create(['name' => 'Room B']);
        Venue::create(['name' => 'Room C']);
    }
}
