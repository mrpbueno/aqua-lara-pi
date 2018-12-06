<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'status',
        'event',
        'value',
        'text'
    ];
}
