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


        Route::resource('organization',"OrganizationController");
        Route::get('organization/preview/{organization}','OrganizationController@preview')->name('organization.preview');
        Route::get('super-admin/preview','OrganizationController@superAdminPreview')->name('super-admin.preview');


        Route::resource('departments',"DepartmentController");


        Route::resource('users',"UserController")->middleware('checkUrlHasOrganizationId');
        Route::post('users/check/email','UserController@userCheckEmail')->name('users.check.email')->middleware('checkUrlHasOrganizationId');
        Route::get('user/organization/preview{organization_id}','UserController@changeOrganizationPreview')->name('change.organization.preview');


        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/profile', 'UserProfileController@index')->name('profile');
        Route::post('/updateProfile', 'UserProfileController@updateProfile')->name('updateProfile');


        Route::resource('health-profile',"HealthProfileController");

        Route::resource('blogs',"BlogController");

        Route::resource('contacts',"ContactController");
});


Auth::routes(['verify' => true,'register' => false]);





