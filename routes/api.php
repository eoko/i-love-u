<?php

use Illuminate\Http\Request;

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


Route::get  ('/loves', 'LoveController@index');
Route::post ('/loves', 'LoveController@store');
Route::get  ('/me/i-am-in-love', 'LoveController@index');
