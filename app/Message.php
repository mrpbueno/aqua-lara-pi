<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from_id',
        'firist_name',
        'chat_id',
        'text',
        'action',
        'date'
    ];
}
