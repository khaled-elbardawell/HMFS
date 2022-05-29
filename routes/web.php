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

<<<<<<< HEAD
        Route::get('/new', function () {
            return view('admin.form');
        });
=======

    Route::resource('organization',"OrganizationController");
    Route::get('organization/preview/{organization}','OrganizationController@preview')->name('organization.preview');
    Route::get('super-admin/preview','OrganizationController@superAdminPreview')->name('super-admin.preview');


    Route::resource('departments',"DepartmentController");


    Route::resource('users',"UserController")->middleware('checkUrlHasOrganizationId');
    Route::post('users/check/email','UserController@userCheckEmail')->name('users.check.email')->middleware('checkUrlHasOrganizationId');
    Route::get('user/organization/preview{organization_id}','UserController@changeOrganizationPreview')->name('change.organization.preview');
>>>>>>> 0b13f29e5518d428fa9324b51d493a9258694def

        Route::resource('organization',"OrganizationController");
        Route::resource('users',"UserController")->middleware('checkUrlHasOrganizationId');
        Route::post('users/check/email','UserController@userCheckEmail')->name('users.check.email')->middleware('checkUrlHasOrganizationId');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/profile', 'UserProfileController@index')->name('profile');
        Route::POST('/updateProfile', 'UserProfileController@updateProfile')->name('updateProfile');

    });


Auth::routes(['verify' => true,'register' => false]);

