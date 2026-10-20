<?php

namespace App\Models\Minitravels;

use App\Traits\BelongsToAgency;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use BelongsToAgency;
    
    protected $fillable = [
        'agency_id',
        'name',
        'city',
        'country',
        'address',
        'phone',
        'email',
        'stars',
        'description',
        'notes',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}