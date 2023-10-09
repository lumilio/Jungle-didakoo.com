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
    public function getUserByWalletAddress(Request $request, $address): \Illuminate\Http\JsonResponse
    {
        if ($request->session()->has('isGuest')){
            return response()->json(['user' => ['address' => $request->session()->get('userSession'), 'balance'=> 0, 'power' => 0, 'color_id' => 1]]);
        }
        $player = Player::where('wallet_address', $address)->first();

        if (!$player) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $player]);
    }
}
