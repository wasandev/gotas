<?php
Route::middleware('web')
    ->namespace('\\App\\Http\\Controllers\Tenant\\')
    ->group(function () {

        Route::get('/', 'TenantController@index')->name('index');
    });
Route::middleware('web', 'auth')
    ->namespace('\\App\\Http\\Controllers\Tenant\\')
    ->group(function () {


        Route::get('/test', 'TestController@index')->name('test');
        Route::get('/quotation/preview/{id}', 'QuotationController@preview')->name('preview'); //For test
        Route::get('/quotation/makepdf/{id}', 'QuotationController@makePDF')->name('makepdf');
        Route::get('/charterjob/preview/{id}', 'CharterJobController@preview')->name('preview'); //for test
        Route::get('/charterjob/makepdf/{id}', 'CharterJobController@makePDF')->name('makepdf');
    });
Route::get('/storage/media/{path}', \Hyn\Tenancy\Controllers\MediaController::class)
    ->where('path', '.+')
    ->name('tenant.media');

Nova::routes()
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ->register();
