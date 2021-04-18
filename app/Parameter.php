<?php

namespace App;

use App\Events\ParameterEvent;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = [
        'date',
        'temperature',
        'ph',
        'nh4',
        'no2',
        'no3',
        'po4',
        'cl',
        'kh',
        'gh',
        'co2',
    ];

    protected $casts = [
        'date' => 'date',
        'temperature' => 'float',
        'ph' => 'float',
        'nh4' => 'float',
        'no2' => 'float',
        'no3' => 'float',
        'po4' => 'float',
        'cl' => 'float',
        'kh' => 'float',
        'gh' => 'float',
        'co2' => 'float'
    ];

    protected $dispatchesEvents = [
        'created' => ParameterEvent::class,
    ];
}
