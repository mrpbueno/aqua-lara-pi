<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Climate extends Model
{
    protected $fillable = [
        'temperature',
        'humidity',
    ];

    protected $casts = [
        'temperature' => 'float',
        'humidity' => 'float',
    ];
}
