<?php
Route::middleware('web')
    ->namespace('\\App\\Http\\Controllers\Tenant\\')
    ->group(function () {

        Route::get('/', 'tenantController@index')->name('index');
    });

Nova::routes()
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ->register();
