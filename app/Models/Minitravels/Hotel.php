<?php

namespace App\Models\Minitravels;

use App\Traits\BelongsToAgency;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use BelongsToAgency;
    
    protected $fillable = [
        'name',
        'city',
        'country',
        'address',
        'phone',
        'email',
        'price_per_night',
        'stars',
        'description',
        'notes',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}