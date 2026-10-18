<?php

namespace App\Models;

use App\Traits\BelongsToAgency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    //use BelongsToAgency;
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
