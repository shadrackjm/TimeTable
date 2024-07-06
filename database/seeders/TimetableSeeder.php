<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timetables = [
            ['time_slot' => '7:00 AM - 8:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '8:00 AM - 9:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '9:00 AM - 10:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '10:00 AM - 11:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '11:00 AM - 12:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '12:00 AM - 13:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '13:00 AM - 14:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '14:00 AM - 15:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '15:00 AM - 16:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '16:00 AM - 17:00 AM', 'day' => 'Monday','venue_data' => 'Room 101', 'status' => 'available'],

            ['time_slot' => '7:00 AM - 8:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '8:00 AM - 9:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '9:00 AM - 10:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '10:00 AM - 11:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '11:00 AM - 12:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '12:00 AM - 13:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '13:00 AM - 14:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '14:00 AM - 15:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '15:00 AM - 16:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
            ['time_slot' => '16:00 AM - 17:00 AM', 'day' => 'Monday','venue_data' => 'BTC', 'status' => 'available'],
        ];

        DB::table('time_tables')->insert($timetables);

        $timetables = [
            ['time_slot' => '7:00 AM - 8:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '8:00 AM - 9:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '9:00 AM - 10:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '10:00 AM - 11:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '11:00 AM - 12:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '12:00 AM - 13:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '13:00 AM - 14:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '14:00 AM - 15:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '15:00 AM - 16:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '16:00 AM - 17:00 AM', 'day' => 'Tuesday','venue_data' => 'Room 101', 'status' => 'available'],
        ];

        DB::table('time_tables')->insert($timetables);

        $timetables = [
            ['time_slot' => '7:00 AM - 8:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '8:00 AM - 9:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '9:00 AM - 10:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '10:00 AM - 11:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '11:00 AM - 12:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '12:00 AM - 13:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '13:00 AM - 14:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '14:00 AM - 15:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '15:00 AM - 16:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '16:00 AM - 17:00 AM', 'day' => 'Wednesday','venue_data' => 'Room 101', 'status' => 'available'],
        ];

        DB::table('time_tables')->insert($timetables);

        $timetables = [
            ['time_slot' => '7:00 AM - 8:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '8:00 AM - 9:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '9:00 AM - 10:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '10:00 AM - 11:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '11:00 AM - 12:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '12:00 AM - 13:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '13:00 AM - 14:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '14:00 AM - 15:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '15:00 AM - 16:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '16:00 AM - 17:00 AM', 'day' => 'Thursday','venue_data' => 'Room 101', 'status' => 'available'],
        ];

        DB::table('time_tables')->insert($timetables);

         $timetables = [
            ['time_slot' => '7:00 AM - 8:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '8:00 AM - 9:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '9:00 AM - 10:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '10:00 AM - 11:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '11:00 AM - 12:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '12:00 AM - 13:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '13:00 AM - 14:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '14:00 AM - 15:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '15:00 AM - 16:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
            ['time_slot' => '16:00 AM - 17:00 AM', 'day' => 'Friday','venue_data' => 'Room 101', 'status' => 'available'],
        ];

        DB::table('time_tables')->insert($timetables);
    }
}
