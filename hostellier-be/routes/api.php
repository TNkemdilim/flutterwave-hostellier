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
 * 🎉 Authentication & Registration
 */
Route::get('/rooms/off-campus', 'Api\V1\RoomController@indexOffCampusRooms');
Route::get('/rooms/on-campus', 'Api\V1\RoomController@indexOnCampusRooms');

/**
 * 🎉 
 */
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/rooms', 'Api\V1\RoomController@index');
});

/**
 * 🎉 
 */
Route::group(['middleware' => ['auth:api', 'api.student']], function () {
    // Student Profile
    Route::get('/me', 'Api\V1\StudentController@showProfile');
    Route::post('/me', 'Api\V1\StudentController@index'); // not yet tested
    
    // Booking
    Route::get('/me/booking', 'Api\V1\StudentController@getAllBookings');
    Route::get('/me/booking/off-campus', 'Api\V1\StudentController@getAllOffCampusBookings');
    Route::get('/me/booking/on-campus', 'Api\V1\StudentController@getAllOnCampusBookings');
    
    Route::post('/booking/off-campus', 'Api\V1\BookingController@createOffCampusBooking');
    Route::post('/booking/on-campus', 'Api\V1\BookingController@createOnCampusBooking');
});

/**
 * 🎉 
 */
Route::group(['middleware' => ['auth:api', 'api.admin']], function () {
    // Rooms
    Route::post('/rooms/off-campus', 'Api\V1\RoomController@createOffCampusRoom');
    Route::post('/rooms/on-campus', 'Api\V1\RoomController@createOnCampusRoom');
});
