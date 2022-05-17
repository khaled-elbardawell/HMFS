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
        'namespace' => 'Admin',
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/new', function () {
        return view('admin.form');
    });

    Route::resource('organization',"OrganizationController");
    Route::resource('users',"UserController")->middleware('checkUrlHasOrganizationId');

    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
});




Auth::routes(['verify' => true,'register' => false]);

