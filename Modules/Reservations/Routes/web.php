<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::resource('reservations',ReservationsController::class);
    Route::get('reservations/users/search','ReservationsController@users_search')->name('reservations.users_search');
    Route::get('reservations/doctors/search','ReservationsController@doctors_search')->name('reservations.doctors_search');
});


