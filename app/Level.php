<?php

namespace App;

use App\Events\LevelEvent;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $casts = [
        'level' => 'float',
    ];

    protected $fillable = [
        'level',
    ];

    protected $dispatchesEvents = [
        'created' => LevelEvent::class,
    ];
}
