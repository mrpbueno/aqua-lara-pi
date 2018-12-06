<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Co2 extends Model
{
    protected $fillable = [
        'start',
        'stop',
        'gpio',
        'active'
    ];
    protected $casts = [
        'start' => 'time',
        'stop' => 'time',
    ];
}
