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



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});



Route::group([
    'middleware' => ['api','api.auth:api'],
], function ($router) {

    Route::get('get/user/upcoming/reservations', 'ReservationsController@getUserUpcomingReservation')->name('get.user.upcoming.reservations');
    Route::get('get/user/previous/reservations', 'ReservationsController@getUserPreviousReservation')->name('get.user.previous.reservations');
    Route::get('get/user/reservation', 'ReservationsController@getUserReservation')->name('get.user.reservation');



    Route::get('get/user/profile', 'UserProfileController@getUserProfileData')->name('get.user.profile');
    Route::post('update/user/profile', 'UserProfileController@updateUserProfileData')->name('update.user.profile');



});
