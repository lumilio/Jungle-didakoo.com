<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
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
        return response()->json(['message' => 'success', 'game' => $game]);
    }
    public function setState(Request $request){
        $id = $request->id;
        $game = Game::where('url',$id)->first();
        $game -> state = ['state' => $request->state, 'turn' => $request->turn];
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
        $winner = $request->winner;
        $game = Game::where('url', $game_id)->where('status', 'pending')->first();
        if(!$game){
            return response()->json(['message' => 'Bed request'], 400);
        }
        if($winner !== $game->creator->wallet_address){
            if ($winner !== $game->opponent->wallet_address){
                return response()->json(['message' => 'Bed request'], 400);
            }
        }
        $winner_is_creator = $game->creator->wallet_address === $winner;
        $creator = Player::query()->where('wallet_address', $game->creator->wallet_address)->first();
        $opponent = Player::query()->where('wallet_address', $game->opponent->wallet_address)->first();
        if ($winner_is_creator){
            $creator->update([
                "power" => $creator->power + 3,
                'wins' => $creator->wins + 1
            ]);
            $opponent->update([
                "power" => $opponent->power + 1
            ]);
        }else{
            $opponent->update([
                "power" => $opponent->power + 3,
                'wins' => $opponent->wins + 1
            ]);
            $creator->update([
                "power" => $creator->power + 1
            ]);
        }
        $game->update([
            'status' => "finished"
        ]);
        return response()->json(['message' => 'finished']);
    }
}
