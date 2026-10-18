<?php

namespace App\Models\Minitravels;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToAgency;

use App\Models\Agency;

class Client extends Model
{
    use BelongsToAgency;

    protected $fillable = [
        'agency_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'birth_date',
        'passport_number',
        'nationality',
        'notes',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
