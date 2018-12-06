<?php

namespace App;

use App\Events\TemperatureEvent;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $fillable = [
        'temperature',
    ];

    protected $casts = [
        'temperature' => 'float',
    ];

    protected $dispatchesEvents = [
        'created' => TemperatureEvent::class,
    ];
}
