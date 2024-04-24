<?php

use App\Events\DoStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/web3-login-verify', 'Web3LoginController@verify');
Route::post('/web3-register-ethwallet', 'Web3LoginController@register');
Route::post('/web3-update-ethwallet', 'Web3LoginController@update');
Route::get('/getUsers', 'UserController@getUsers');
Route::get('/user-by-wallet-address/{address}', 'UserController@getUserByWalletAddress');
Route::post('/make-game', 'GameController@makeGame');
Route::get('/active-game-mode', 'GameController@getActiveGameMode');
Route::post('/get-game/{url}', 'GameController@getGame');
Route::get('/getSession', 'Web3LoginController@getSession');
Route::get('/logout', 'Web3LoginController@logout');
Route::post('/login-as-guest', 'Web3LoginController@loginAsGuest');
Route::post('/finish-game', 'GameController@finishedGame');
Route::get('/delete-game/{url}', 'GameController@deleteGame');
Route::post('/set-state', 'GameController@setState');
Route::post('/update-player-last-activity', 'Web3LoginController@updatePlayerLastActivity');

Route::get('/web3-login-message', 'Web3LoginController@message');
Route::get('/get-users', 'UserController@getUsers');
Route::get('/active-sessions', 'UserController@getActiveSessions');
Route::post('/if-there-nft', 'Web3LoginController@IfThereNft');
Route::post('/nft-Collection', 'Web3LoginController@NftCollection');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});






