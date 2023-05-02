<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(){
        $players = Player::query()->orderBy('power', 'desc')->get();
        return response()->json(['users' => $players]);
    }
}
