<?php

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

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
});

Route::group(['prefix' => 'tweets'], function() {
    Route::get('index', 'Api\TweetsController@index');
    Route::post('store', 'Api\TweetsController@store');
});

Route::group(['prefix' => 'users'], function() {
    Route::get('index', 'Api\UsersController@index');
    Route::get('{user}', 'Api\UsersController@show');
});