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

Route::get('/api/getSession', 'Web3LoginController@getSession');
Route::get('/api/logout', 'Web3LoginController@logout');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
