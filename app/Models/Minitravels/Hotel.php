<?php

namespace App\Models\Minitravels;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
