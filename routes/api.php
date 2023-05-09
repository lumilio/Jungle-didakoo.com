<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/web3-login-message', 'Web3LoginController@message');

Route::get('/get-users', 'UserController@getUsers');

Route::get('/make-game', 'GameController@makeGame');
Route::get('/get-game/{url}', 'GameController@getGame');
Route::post('/finish-game', 'GameController@finishedGame');
Route::get('/delete-game/{url}', 'GameController@deleteGame');
