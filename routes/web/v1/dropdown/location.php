<?php

use App\Http\Controllers\Web\Backend\V1\Dropdown\CityController;
use App\Http\Controllers\Web\Backend\V1\Dropdown\CountryController;
use App\Http\Controllers\Web\Backend\V1\Dropdown\StateController;
use Illuminate\Support\Facades\Route;

/**
 * route  for City
 */

 Route::prefix('/city')->name('city.')->controller(CityController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{city:slug}', 'edit')->name('edit');
    Route::put('/update/{city:slug}', 'update')->name('update');
    Route::delete('/destroy/{city:slug}', 'destroy')->name('destroy');
});

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

/**
 * route  for State
 */

Route::prefix('/state')->name('state.')->controller(StateController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{state:slug}', 'edit')->name('edit');
    Route::put('/update/{state:slug}', 'update')->name('update');
    Route::delete('/destroy/{state:slug}', 'destroy')->name('destroy');
});

