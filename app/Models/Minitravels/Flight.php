<?php

namespace App\Models\Minitravels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Agency;

class Flight extends Model
{
    use HasFactory;
    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_date' => 'datetime',
    ];
    protected $fillable = [
        'flight_number',
        'origin',
        'destination',
        'departure_date',
        'arrival_date',
        'status',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
