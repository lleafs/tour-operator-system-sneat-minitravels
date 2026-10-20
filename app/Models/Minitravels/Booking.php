<?php

namespace App\Models\Minitravels;

use App\Traits\BelongsToAgency;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tour;

class Booking extends Model
{
    use BelongsToAgency;

    protected $fillable = [
        'agency_id',
        'client_id',
        'flight_id',
        'hotel_id',
        'room_type',
        'price_per_night',
        'hotel_nights',
        'hotel_total',
        'tour_id',
        'tour_days',
        'status',
        'booking_reference',
        'amount',
        'notes',
    ];

    public function agency()
    {
        return $this->belongsTo(\App\Models\Agency::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function tour()
{
    return $this->belongsTo(Tour::class);
}
}
