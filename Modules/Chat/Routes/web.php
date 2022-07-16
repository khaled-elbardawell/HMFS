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

Route::prefix('chat')->group(function() {
    Route::get('/', 'ChatController@index')->name('chat');
    Route::get('chat/search/user', 'ChatController@chatSearchUser')->name('chat.search.user');
    Route::get('chat/user', 'ChatController@chatUser')->name('chat.user');
    Route::post('send/message', 'ChatController@sendMessage')->name('send.message');
    Route::post('seen/messages', 'ChatController@seenMessages')->name('seen.messages');
});
