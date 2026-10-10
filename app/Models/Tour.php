<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si coincide con el plural del modelo)
    protected $table = 'tours';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'location',
        'price',
        'description',
        'start_date',
        'end_date',
    ];
}
