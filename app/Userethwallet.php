<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userethwallet extends Model
{
    protected $fillable = [
        'ethwalletaddr',
        'balance',
        'alias',
    ];
}