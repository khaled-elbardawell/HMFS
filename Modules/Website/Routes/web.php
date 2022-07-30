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
        Route::get('/', 'FrontController@index')->name('index');
        Route::get('/posts', 'FrontController@posts')->name('posts');
        Route::get('/blog-single/{id}', 'FrontController@postSingle')->name('blogSingle');
        Route::get('/offers-front', 'FrontController@offers')->name('offers-front');
        Route::get('/about-us', 'FrontController@aboutUs')->name('aboutUs');
        Route::get('/contact-us', 'FrontController@contactUs')->name('contactUs');
        Route::post('/sendContactUs', 'FrontController@sendContactUs')->name('sendContactUs');
        Route::get('/faqs', 'FrontController@faqs')->name('faqs');
        Route::get('/our-services', 'FrontController@ourServices')->name('ourServices');

        Route::get('/createInfoPayments','PaymentController@createInfoPayments')->name('createInfoPayments');
        Route::post('/storeInfoPayments','PaymentController@storeInfoPayments')->name('storeInfoPayments');
        Route::get('payment','PaymentController@payment')->name('payment');
        Route::get('cancel/payment','PaymentController@cancelPayment')->name('cancel-payment');
        Route::get('success/payment','PaymentController@successPayment')->name('success-payment');
    });
