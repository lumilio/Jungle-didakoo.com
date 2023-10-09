<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/api/web3-login-verify', 'Web3LoginController@verify');


Route::post('/api/web3-register-ethwallet', 'Web3LoginController@register');
Route::post('/api/web3-update-ethwallet', 'Web3LoginController@update');
Route::get('/api/getUsers', 'UserController@getUsers');
Route::get('api/user-by-wallet-address/{address}', 'UserController@getUserByWalletAddress');
Route::post('/api/make-game', 'GameController@makeGame');
Route::post('/api/get-game/{url}', 'GameController@getGame');
Route::get('/api/getSession', 'Web3LoginController@getSession');
Route::get('/api/logout', 'Web3LoginController@logout');
Route::post('/api/login-as-guest', 'Web3LoginController@loginAsGuest');
Route::post('/api/finish-game', 'GameController@finishedGame');
Route::get('/api/delete-game/{url}', 'GameController@deleteGame');
Route::post('/api/set-state', 'GameController@setState');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
