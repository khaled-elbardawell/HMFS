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
         Route::resource('task',TaskController::class);
         Route::post('task/create','BoardController@store')->name('board.store');
         Route::post('task/{id}/edit','BoardController@update')->name('board.update');
         Route::post('task/{id}/delete','BoardController@delete')->name('board.destroy');
});
