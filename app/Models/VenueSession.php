<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'venue_id',
        'teacher_id',
        'subject',
        'day_of_week',
        'start_time',
        'end_time',
        'is_skipped',
        'is_booked',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
