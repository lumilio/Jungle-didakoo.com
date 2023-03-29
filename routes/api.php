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
Route::post('/web3-login-verify', 'Web3LoginController@verify');

Route::post('/web3-register-ethwallet', 'Web3LoginController@register');
Route::post('/web3-update-ethwallet', 'Web3LoginController@update');

Route::get('/getSession', 'Web3LoginController@getSession');
Route::get('/logout', 'Web3LoginController@logout');
 