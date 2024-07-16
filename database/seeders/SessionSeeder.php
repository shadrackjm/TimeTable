<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\VenueSession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VenueSession::create([
            'venue_id' => 1,
            'teacher_id' => 1,
            'subject' => 'Biology',
            'day_of_week' => 'Monday',
            'start_time' => Carbon::createFromTime(7, 0, 0),
            'end_time' => Carbon::createFromTime(8, 0, 0),
        ]);

        VenueSession::create([
            'venue_id' => 2,
            'teacher_id' => 2,
            'subject' => 'Math',
            'day_of_week' => 'Tuesday',
            'start_time' => Carbon::createFromTime(9, 0, 0),
            'end_time' => Carbon::createFromTime(10, 0, 0),
        ]);
    }
}
