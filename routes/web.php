<?php

use Laravel\Nova\Nova;
//use Wasandev\TranjobEntry\Http\Controllers;




Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'System'], function () {
    //Route::post('register', 'Auth\RegisterController@register');
    //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::post('login', 'Auth\LoginController@login');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Auth::routes(['verify' => true]);
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

    Route::post('setup', 'UsersController@setup');
    Route::get('setup', 'UsersController@showSetup')->name('setup');

    Route::get('home', 'HomeController@index')->name('home');


    Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');
    Route::get('determine-profile-route', 'ProfileController@determineProfileRoute')->name('determine-profile-route');
    Route::resource('profile', 'ProfileController');

    //setting
    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('settings', 'SettingsController@update')->name('user-update');
});



//
//Route::resource('tranjob-entry', 'TranjobController');
//Route::get('show-tranjob/{id}', 'TranjobController@show')->name('show-tranjob');
