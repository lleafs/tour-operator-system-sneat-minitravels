<?php

namespace App\Models\Minitravels;

use App\Traits\BelongsToAgency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Agency;

class Flight extends Model
{
    use BelongsToAgency;
    use HasFactory;

    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_date' => 'datetime',
    ];
    protected $fillable = [
        'agency_id',
        'flight_number',
        'airline',
        'origin',
        'destination',
        'departure_date',
        'arrival_date',
        'price',
        'status',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
