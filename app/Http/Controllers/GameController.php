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
            if ($request->multiPlay){
                $status = 'pending';
            }
            $colorsCaseA = [
                "black" => rand(5, 6),
                "board" => 1,
                "white" => rand(5, 6),
            ];
            while ($colorsCaseA["black"] === $colorsCaseA["white"]) {
                $colorsCaseA["white"] = rand(5, 6);
            }
            $colorsCaseB = [
                "black" => rand(1, 4),
                "board" => rand(1, 2),
                "white" => rand(1, 4),
            ];
            while ($colorsCaseB["black"] === $colorsCaseB["white"]) {
                $colorsCaseB["white"] = rand(1, 4);
            }
            $randomColors = rand(0, 1) ? $colorsCaseA : $colorsCaseB;
            GuestGame::create([
                'creator' => $player,
                'url' => $uniqueUrl,
                'status' => $status,
                'state' => [
                    'state' => $request->state,
                    'turn' => 'white',
                    "colors" => $randomColors
                ]
            ]);
        }else{
            $player = Player::where('wallet_address', $request->address)->first();
            if (!$player){
                return response()->json(['message' => 'Bed request'], 400);
            }
            $status = 'started';
            if ($request->multiPlay){
                $status = 'pending';
            }
            $colorsCaseA = [
                "black" => rand(5, 6),
                "board" => 1,
                "white" => rand(5, 6),
            ];
            while ($colorsCaseA["black"] === $colorsCaseA["white"]) {
                $colorsCaseA["white"] = rand(5, 6);
            }
            $colorsCaseB = [
                "black" => rand(1, 4),
                "board" => rand(1, 2),
                "white" => rand(1, 4),
            ];
            while ($colorsCaseB["black"] === $colorsCaseB["white"]) {
                $colorsCaseB["white"] = rand(1, 4);
            }
            $randomColors = rand(0, 1) ? $colorsCaseA : $colorsCaseB;
            Game::create([
                'creator_id' => $player->id,
                'url' => $uniqueUrl,
                'status' => $status,
                'state' => [
                    'state' => $request->state,
                    'turn' => 'white',
                    "colors" => $randomColors
                ]
            ]);
        }

        return response()->json(['message' => 'success', 'url' => $uniqueUrl], 201);
    }

    public function getGame(Request $request, $url){
        if ($request->session()->has('isGuest')){
            try {
                $player = $request->session()->get('userSession');
                $game = GuestGame::query()->where('url', $url)->first();
                if (!$game){
                    $game = Game::query()->where('url', $url)->first();
                    if ($game->status === "pending"){
                        $newGame = GuestGame::create([
                            'creator' => $game->creator->wallet_address,
                            'opponent' => $player,
                            'url' => $game->url,
                            'status' => 'started',
                            'state' => $game->state,
                        ]);
                        $game->delete();
                        $creator = $newGame->creator;
                        $newGame['opponent'] = ['wallet_address' => $newGame->opponent];
                        $newGame['creator'] = ['wallet_address' => $newGame->creator];
                        event(new ConnectGame($creator));
                        return response()->json(['message' => 'success', 'game' => $newGame]);
                    }
                }else{
                    $player = $request->session()->get('userSession');
                    if ($game->status === "started" && !($player === $game->creator || $player === $game->opponent)){
                        return response()->json(['message' => 'Bed request'], 400);
                    }
                    if ($game->status === "pending" && $game->creator !== $player){
                        $game->update([
                            'opponent' => $player,
                            'status' => 'started'
                        ]);
                        $game = GuestGame::query()->where('url', $url)->first();
                        event(new ConnectGame($game->creator));
                    }
                    $game['opponent'] = ['wallet_address' => $game->opponent];
                    $game['creator'] = ['wallet_address' => $game->creator];
                    return response()->json(['message' => 'success', 'game' => $game]);
                }

            }catch (\Exception $e){
                return response()->json(['message' => 'Bed request'], 400);
            }

        }else{
            $game = Game::query()->where('url', $url)->with(['opponent', 'creator'])->first();
            $player = Player::where('wallet_address', $request->address)->first();
        }
        if (!$player){
            return response()->json(['message' => 'Bed request'], 400);
        }
        if (!$game){
            $game = GuestGame::query()->where('url', $url)->first();
            if (!$game) return response()->json(['message' => 'Not Found'], 404);
            if ($game->status === "started" && !($player->wallet_address === $game->creator || $player->wallet_address === $game->opponent) ){
                return response()->json(['message' => 'Bed request'], 400);
            }
            if ($game->status === "pending"){
                $game->update([
                    'opponent' => $player->wallet_address,
                    'status' => 'started'
                ]);
                $game = GuestGame::query()->where('url', $url)->first();
                $creator = $game->creator;
                $game['opponent'] = ['wallet_address' => $game->opponent];
                $game['creator'] = ['wallet_address' => $game->creator];
                event(new ConnectGame($creator));
                return response()->json(['message' => 'success', 'game' => $game]);
            }
            $game['opponent'] = ['wallet_address' => $game->opponent];
            $game['creator'] = ['wallet_address' => $game->creator];
            return response()->json(['message' => 'success', 'game' => $game]);

        }
        if ($game->status === "started" && !($player->id === $game->creator_id || $player->id === $game->opponent_id)){
            return response()->json(['message' => 'Bed request'], 400);
        }
        if ($game->status === "pending" && $game->creator_id !== $player->id){
            $game->update([
                'opponent_id' => $player->id,
                'status' => 'started'
            ]);
            $game = Game::query()->where('url', $url)->with(['opponent', 'creator'])->first();

            event(new ConnectGame($game->creator->wallet_address));
        }

        return response()->json(['message' => 'success', 'game' => $game]);
    }
    public function setState(Request $request){
        $id = $request->id;
        if ($request->session()->has('isGuest')){
            $game = GuestGame::where('url',$id)->first();
            if($game->opponent){
                $turn = $request->address === $game->opponent ? "white" : "black";
                $game->state = ['state' => $request->state, 'turn'=> $turn, 'colors' => $request->colors];
                $game->save();
                    event(new DoStep(
                        $game,
                        $request->address === $game->opponent ? $game->creator : $game->opponent,
                        $request->lastMove
                    ));
            }else{
                $turn = $request->turn;
                $game->state = ['state' => $request->state, 'turn'=> $turn, 'colors' => $request->colors];
                $game->save();
            }
        }else{
            $game = Game::where('url',$id)->first();
            if ($game){
                if($game->opponent_id && $game->opponent->wallet_address){
                    $turn = $request->address === $game->opponent->wallet_address ? "white" : "black";
                    $game->state = ['state' => $request->state, 'turn'=> $turn, 'colors' => $request->colors];
                    $game->save();
                    if ($game->opponent->wallet_address)
                        event(new DoStep(
                            $game,
                            $request->address === $game->opponent->wallet_address ? $game->creator->wallet_address : $game->opponent->wallet_address,
                            $request->lastMove
                        ));
                   }else{
                    $turn = $request->turn;
                    $game->state = ['state' => $request->state, 'turn'=> $turn, 'colors' => $request->colors];
                    $game->save();
                }
            }else{
                $game = GuestGame::where('url',$id)->first();
                $turn = $request->address === $game->opponent ? "white" : "black";
                $game->state = ['state' => $request->state, 'turn'=> $turn, 'colors' => $request->colors];
                $game->save();
                event(new DoStep(
                    $game,
                    $request->address === $game->opponent ? $game->creator : $game->opponent,
                    $request->lastMove
                ));
            }


        }
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
            $game = GuestGame::where('url', $game_id)->where('status', 'started')->orWhere('status', 'finished')->first();
            if(!$game){
                return response()->json(['message' => 'Bed request'], 400);
            }

            $game->update([
                'status' => "finished"
            ]);
            return response()->json(['message' => 'finished']);
        }
        $game = Game::where('url', $game_id)->where('status', 'started')->first();
        $finishedGame = Game::where('url', $game_id)->where('status', 'finished')->first();
        if ($finishedGame){
            return response()->json(['message' => 'finished']);
        }
        if(!$game){
            $game = GuestGame::where('url', $game_id)->where('status', 'started')->orWhere('status', 'finished')->first();
            if (!$game){
                return response()->json(['message' => 'Bed request'], 400);
            }
            $game->update([
                'status' => "finished"
            ]);
            return response()->json(['message' => 'finished']);
        }
        if ($player === $game->creator->wallet_address || $player === $game->opponent->wallet_address){
            $creator = Player::query()->where('wallet_address', $player)->first();

            if ($win){
                $creator->update([
                    "power" => $creator->power + 3,
                    'wins' => $creator->wins + 1
                ]);
            }else{
                $creator->update([
                    "power" => $creator->power + 1
                ]);
            }
            $game->update([
                'status' => "finished"
            ]);
            return response()->json(['message' => 'finished']);
        }else{
            return response()->json(['message' => 'Bed request'], 400);
        }

    }
}
