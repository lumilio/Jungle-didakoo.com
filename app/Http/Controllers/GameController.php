<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function makeGame(){
        do{
            $uniqueUrl = Str::random(30);
        }while(Game::query()->where('url', $uniqueUrl)->first());
        Game::create([
//            'creator' => auth('api')->id(),
            'url' => $uniqueUrl,
            'status' => 'pending'
        ]);
        return response()->json(['message' => 'success', 'url' => $uniqueUrl], 201);
    }

    public function getGame($url){
        $game = Game::query()->where('url', $url)->first();
        if (!$game){
            return response()->json(['message' => 'Not Found'], 404);
        }
//        if ($game->creator !== auth('api')->id()){
//            $game->update([
//                'opponent' => auth('api')->id()
//            ]);
//        }
        return response()->json(['message' => 'success']);
    }
}
