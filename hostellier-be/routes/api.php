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

/**
 * 🎉 Authentication & Registration
 */
Route::post('auth/student/login', 'Api\V1\AuthController@loginStudent');
Route::post('auth/student/register', 'Api\V1\AuthController@registerStudent');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/rooms/off-campus', 'Api\V1\RoomController@index');
});