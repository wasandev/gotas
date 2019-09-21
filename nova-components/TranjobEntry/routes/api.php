<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Wasandev\TranjobEntry\Http\Controllers\TranjobController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/



//Route::get('tranjob-entry', TranjobController::class . '@index')->name('tranjob-entry.index');
//Route::post('tranjob-entry', TranjobController::class . '@store')->name('tranjob-entry.store');
//Route::put('tranjob-entry', TranjobController::class . '@update')->name('tranjob-entry.update');
Route::resource('/tranjob-entry', TranjobController::class);
//Route::get('/show/{tranjobId}', TranjobController::class . '@show')->name('tranjob-detail');
