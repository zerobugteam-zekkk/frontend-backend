<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'flight_number',
        'airline',
        'type',
        'city',
        'time',
        'gate',
        'status',
        'flight_date',
    ];

    protected $casts = [
        'flight_date' => 'date',
    ];
}
