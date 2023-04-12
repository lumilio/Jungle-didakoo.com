<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'creator',
        'opponent',
        'url',
        'status'
    ];
}
