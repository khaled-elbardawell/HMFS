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
    ], function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/blogs', 'HomeController@blogs')->name('blogs');
        Route::get('/blog-single', 'HomeController@blogSingle')->name('blogSingle');
        Route::get('/offers', 'HomeController@offers')->name('offers');
        Route::get('/about-us', 'HomeController@aboutUs')->name('aboutUs');
        Route::get('/contact-us', 'HomeController@contactUs')->name('contactUs');
        Route::get('/faqs', 'HomeController@faqs')->name('faqs');
        Route::get('/our-services', 'HomeController@ourServices')->name('ourServices');
    });
