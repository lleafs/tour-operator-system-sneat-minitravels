<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToAgency;

use App\Models\Minitravels\Booking;

class Tour extends Model
{
    use BelongsToAgency;
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'name',
        'slug',
        'destination',
        'days',
        'nights',
        'daily_rate',
        'price',
        'short_description',
        'description',
        'featured_image',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
