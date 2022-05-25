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
         Route::resource('board',BoardController::class);
         Route::resource('task',TaskController::class);
         Route::post('task/create','BoardCardController@store')->name('board_card.store');
         Route::post('task/{id}/edit','BoardCardController@update')->name('board_card.update');
         Route::post('task/{id}/delete','BoardCardController@delete')->name('board_card.destroy');
         Route::post('task/moveCard','TaskController@moveCard')->name('task.moveCard');
         Route::post('task/renameBoardCard','BoardCardController@renameBoardCard')->name('board_card.renameBoardCard');

});
