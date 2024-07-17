<?php

namespace App\Imports;

use App\Models\VenueSession;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VenueSessionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new VenueSession([
            'subject' => $row['subject'],
            'teacher_id' => $row['teacher_id'],
            'day_of_week' => $row['day_of_week'],
            'start_time' => Carbon::parse($row['start_time'])->format('H:i:s'),
            'end_time' => Carbon::parse($row['end_time'])->format('H:i:s'),
            'venue_id' => $row['venue_id'],
            'is_skipped' => $row['is_skipped'],
        ]);
    }
}
