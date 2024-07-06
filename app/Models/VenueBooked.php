<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueBooked extends Model
{
    use HasFactory;

    protected $fillable = [
        "venue_id",
        "user_id",
        "time_slot",
        "day_of_week",
    ] ;

    public function venue(){
        return $this->belongsTo(TimeTable::class,'venue_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
