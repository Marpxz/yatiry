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

    Route::post('showscoreboard', 'ScoreboardController@show');
    Route::put('scoreboardedit', 'ScoreboardController@edit');
    Route::post('scoreboardstore', 'ScoreboardController@store');
    Route::post('scoreboard', 'ScoreboardController@Scoreboard');
});
Route::get('signup/activate/{token}', 'PassportController@signupActivate');
Route::post('create', 'PasswordResetController@create');
Route::get('find/{token}', 'PasswordResetController@find');
Route::post('reset', 'PasswordResetController@reset');
