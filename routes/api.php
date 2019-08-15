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

Route::post('login', 'PassportController@login');
Route::post('signup', 'PassportController@signup');
Route::post('checkcollege', 'PassportController@checkcollege');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('showleaderboard', 'LeaderboardController@show');
    Route::put('leaderboardupdate', 'LeaderboardController@update');
    Route::post('leaderboardstore', 'LeaderboardController@store');
    Route::get('ranking', 'LeaderboardController@index');
    Route::post('leaderboard', 'LeaderboardController@leaderboard');
});
