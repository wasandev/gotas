<?php

Route::middleware('web')
    ->namespace('\\App\\Http\\Controllers\Tenant\\')
    ->group(function () {

        Route::get('/', 'TenantController@index')->name('index');
        Route::get('/test', 'TestController@index')->name('test');
    });


Nova::routes()
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ->register();
