<?php
Route::middleware('web')
    ->namespace('\\App\\Http\\Controllers\Tenant\\')
    ->group(function () {

        Route::get('/', 'TenantController@index')->name('index');
    });


Nova::routes()
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ->register();
