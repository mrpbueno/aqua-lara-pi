<?php

namespace App;

use App\Events\RpiEvent;
use Illuminate\Database\Eloquent\Model;

class Rpi extends Model
{
    protected $fillable = [
        'temperature',
        'memory',
        'disk',
        'cpu',
        'uptime'
    ];

    protected $casts = [
        'temperature' => 'float',
        'memory' => 'float',
        'disk' => 'float',
        'cpu' => 'float',
        'uptime' => 'integer',
    ];

    protected $dispatchesEvents = [
        'created' => RpiEvent::class,
    ];
}
