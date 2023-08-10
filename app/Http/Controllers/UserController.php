<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(): \Illuminate\Http\JsonResponse
    {
        $players = Player::query()->orderBy('power', 'desc')->get();
        return response()->json(['users' => $players]);
    }
    public function getUserByWalletAddress($address): \Illuminate\Http\JsonResponse
    {
        $player = Player::where('wallet_address', $address)->first();

        if (!$player) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $player]);
    }
}
