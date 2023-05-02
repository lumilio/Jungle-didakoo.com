<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'creator_id',
        'opponent_id',
        'url',
        'status'
    ];
    public function creator(){
        return $this->belongsTo(Player::class, 'creator_id');
    }
    public function opponent(){
        return $this->belongsTo(Player::class, 'opponent_id');
    }
}
