<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function makeGame(Request $request){
        do{
            $uniqueUrl = Str::random(30);
        }while(Game::query()->where('url', $uniqueUrl)->first());
        $player = Player::where('wallet_address', $request->address)->first();
        if (!$player){
            return response()->json(['message' => 'Bed request'], 400);
        }
        Game::create([
            'creator_id' => $player->id,
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
        return response()->json(['message' => 'success', 'game' => $game]);
    }
    public function setState(Request $request){
        $id = $request->id;
        $game = Game::where('url',$id)->first();
        $game->status = 'started';
        $game -> state = ['state' => $request->state, 'turn' => $request->turn, 'colors' => $request->colors];
        $game->save();
        return response()->json([
            'data' => $request->all(),
            'game' => $game
        ]);
    }
    public function deleteGame($url){
        $game = Game::query()->where('url', $url)->first();
        if (!$game){
            return response()->json(['message' => 'Not Found'], 404);
        }
        if(!$game->opponent){
            $game->delete();
        }
//        if ($game->creator !== auth('api')->id()){
//            $game->update([
//                'opponent' => auth('api')->id()
//            ]);
//        }
        return response()->json(['message' => 'deleted']);
    }
    public function finishedGame(Request $request){
        $game_id = $request->game_id;
        $player = $request->player;
        $win  = $request->win;
        $game = Game::where('url', $game_id)->where('status', 'started')->first();
        if(!$game){
            return response()->json(['message' => 'Bed request'], 400);
        }
        if ($player !== $game->creator->wallet_address){
            return response()->json(['message' => 'Bed request'], 400);
        }
        $creator = Player::query()->where('wallet_address', $player)->first();

        if ($win){
            $creator->update([
                "power" => $creator->power + 1,
                'wins' => $creator->wins + 1
            ]);
        }else{
            $creator->update([
                "power" => $creator->power + 0
            ]);
        }
        $game->update([
            'status' => "finished"
        ]);
        return response()->json(['message' => 'finished']);
    }
}
