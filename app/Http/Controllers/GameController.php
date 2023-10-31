<?php

namespace App\Http\Controllers;

use App\Events\ConnectGame;
use App\Events\DoStep;
use App\Game;
use App\GuestGame;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function makeGame(Request $request){
        do{
            $uniqueUrl = Str::random(30);
        }while(Game::query()->where('url', $uniqueUrl)->first());
        if ($request->session()->has('isGuest')){
            $player = $request->session()->get('userSession');
            $status = 'started';
            if ($request->invite){
                $status = 'pending';
            }
            GuestGame::create([
                'creator' => $player,
                'url' => $uniqueUrl,
                'status' => $status
            ]);
        }else{
            $player = Player::where('wallet_address', $request->address)->first();
            if (!$player){
                return response()->json(['message' => 'Bed request'], 400);
            }
            $status = 'started';
            if ($request->invite){
                $status = 'pending';
            }
            Game::create([
                'creator_id' => $player->id,
                'url' => $uniqueUrl,
                'status' => $status
            ]);
        }

        return response()->json(['message' => 'success', 'url' => $uniqueUrl], 201);
    }

    public function getGame(Request $request, $url){
        if ($request->session()->has('isGuest')){
            try {
                $game = GuestGame::query()->where('url', $url)->first();
                $player = $request->session()->get('userSession');

                if ($game->status === "started" && !($player === $game->creator || $player === $game->opponent)){
                    return response()->json(['message' => 'Bed request'], 400);
                }
                if ($game->status === "pending" && $game->creator !== $player){
                    $game->update([
                        'opponent' => $player,
                        'status' => 'started'
                    ]);
                    event(new ConnectGame($game->creator->wallet_address));
                }
                return response()->json(['message' => 'success', 'game' => $game]);
            }catch (\Exception $e){
                return response()->json(['message' => 'Bed request'], 400);
            }

        }else{
            $game = Game::query()->where('url', $url)->first();
            $player = Player::where('wallet_address', $request->address)->first();
        }
        if (!$player){
            return response()->json(['message' => 'Bed request'], 400);
        }
        if (!$game){
            return response()->json(['message' => 'Not Found'], 404);
        }
        if ($game->status === "started" && !($player->id === $game->creator_id || $player->id === $game->opponent_id)){
            return response()->json(['message' => 'Bed request'], 400);
        }
        if ($game->status === "pending" && $game->creator_id !== $player->id){
            $game->update([
                'opponent_id' => $player->id,
                'status' => 'started'
            ]);
        }

        return response()->json(['message' => 'success', 'game' => $game]);
    }
    public function setState(Request $request){
        $id = $request->id;
        if ($request->session()->has('isGuest')){
            $game = GuestGame::where('url',$id)->first();
        }else{
            $game = Game::where('url',$id)->first();
        }
        $game->state = ['state' => $request->state, 'turn' => $request->turn, 'colors' => $request->colors];
        $game->save();
        if ($game->opponent->wallet_address)
        event(new DoStep($game, $request->address === $game->opponent->wallet_address ? $game->creator->wallet_address : $game->opponent->wallet_address));

        return response()->json([
            'data' => $request->all(),
            'game' => $game
        ]);
    }
    public function deleteGame(Request $request, $url){
        if ($request->session()->has('isGuest')){
            $game = GuestGame::query()->where('url', $url)->first();
        }else{
            $game = Game::query()->where('url', $url)->first();
        }
        if (!$game){
            return response()->json(['message' => 'Not Found'], 404);
        }
        if(!$game->opponent){
            $game->delete();
        }
        return response()->json(['message' => 'deleted']);
    }
    public function finishedGame(Request $request){
        $game_id = $request->game_id;
        $player = $request->player;
        $win  = $request->win;
        if ($request->session()->has('isGuest')){
            $game = GuestGame::where('url', $game_id)->where('status', 'started')->first();
            if(!$game){
                return response()->json(['message' => 'Bed request'], 400);
            }
            $game->update([
                'status' => "finished"
            ]);
            return response()->json(['message' => 'finished']);
        }
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
