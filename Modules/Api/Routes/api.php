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


    Route::get('get/user/chats', 'ChatController@getChats')->name('get.user.chats');
    Route::get('get/user/chat/messages', 'ChatController@getMessagesChat')->name('get.user.chat.messages');
    Route::post('user/chat/send', 'ChatController@sendMessage')->name('user.chat.sendMessage');
    Route::post('user/chat/seen/messages', 'ChatController@seenMessages')->name('user.chat.seenMessages');
    Route::post('create/user/chat', 'ChatController@createChatUser')->name('user.chat.create.user.chat');
    Route::get('chat/search/users', 'ChatController@chatSearchUsers')->name('user.chat.search.users');


    Route::get('get/user/doctors', 'UserDoctorController@getUserDoctors')->name('get.user.doctors');
    Route::get('get/user/doctor', 'UserDoctorController@getUserDoctor')->name('get.user.doctor');


});
