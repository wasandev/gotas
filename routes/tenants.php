<?php

Route::middleware('web', 'auth')
    ->namespace('\\App\\Http\\Controllers\Tenant\\')
    ->group(function () {

        Route::get('/', 'TenantController@index')->name('index');
        Route::get('/test', 'TestController@index')->name('test');
        Route::get('/quotation/preview/{id}', 'QuotationController@preview')->name('preview');
        Route::get('/quotation/makepdf/{id}', 'QuotationController@makePDF')->name('makepdf');
    });
Route::get('/storage/media/{path}', \Hyn\Tenancy\Controllers\MediaController::class)
    ->where('path', '.+')
    ->name('tenant.media');

Nova::routes()
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ->register();
