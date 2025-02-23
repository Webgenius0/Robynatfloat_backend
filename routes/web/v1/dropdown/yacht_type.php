<?php

use App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController;
use Illuminate\Support\Facades\Route;

/**
 * route  for yacht-type
 */
Route::prefix('/yacht-type')->name('yacht.type.')->controller(YachtTypeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/store', 'store')->name('store');
    Route::get('/edit/{yachtType:slug}', 'edit')->name('edit');
    Route::get('/update/{yachtType:slug}', 'update')->name('update');
    Route::get('/destroy/{yachtType:slug}', 'destroy')->name('destroy');
});
