<?php

use App\Http\Controllers\Web\Backend\V1\Dropdown\Citycontroller;
use App\Http\Controllers\Web\Backend\V1\Dropdown\CountryController;
use Illuminate\Support\Facades\Route;

/**
 * route  for City
 */

 Route::prefix('/city')->name('city.')->controller(Citycontroller::class)->group(function () {
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

Route::prefix('/state')->name('state.')->controller(CountryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{country:slug}', 'edit')->name('edit');
    Route::put('/update/{country:slug}', 'update')->name('update');
    Route::delete('/destroy/{country:slug}', 'destroy')->name('destroy');
});

