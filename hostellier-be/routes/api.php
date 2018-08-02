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

/**
 * 🎉 
 */
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/rooms', 'Api\V1\RoomController@index');
    Route::get('/rooms/off-campus', 'Api\V1\RoomController@indexOffCampusRooms');
    Route::get('/rooms/on-campus', 'Api\V1\RoomController@indexOnCampusRooms');
});

Route::group(['middleware' => ['auth:api', 'api.student']], function () {
    // Profile
    Route::get('/me', 'Api\V1\StudentController@showProfile');
    Route::post('/me', 'Api\V1\StudentController@index');

    // Bookings
    Route::get('/me/booking', 'Api\V1\BookingController@indexOffCampusRooms');
    Route::get('/me/booking/off-campus', 'Api\V1\BookingController@indexOnCampusRooms');
    Route::get('/me/booking/on-campus', 'Api\V1\BookingController@indexOnCampusRooms');
});