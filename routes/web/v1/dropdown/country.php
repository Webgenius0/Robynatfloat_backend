<?php

use App\Http\Controllers\Web\Backend\V1\Dropdown\CountryController;
use Illuminate\Support\Facades\Route;

/**
 * route  for Country
 */
Route::prefix('/country')->name('country.')->controller(CountryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{country:slug}', 'edit')->name('edit');
    Route::put('/update/{country:slug}', 'update')->name('update');
    Route::delete('/destroy/{country:slug}', 'destroy')->name('destroy');
});

