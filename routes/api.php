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

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('wallet-view', 'Api\RegisterController@wallet_view');
    Route::post('profileUpdate', 'Api\RegisterController@profileUpdate');
    Route::post('passwordUpdate', 'Api\RegisterController@passwordUpdate');
});

Route::post('register', 'Api\RegisterController@register');
Route::post('login', 'Api\AuthController@login');
