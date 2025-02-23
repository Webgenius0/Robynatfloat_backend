<?php

use App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController;
use Illuminate\Support\Facades\Route;

/**
 * route  for yacht-type
 */
Route::prefix('/yacht-type')->name('yacht.type')->controller(YachtTypeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/store', 'store')->name('store');
    Route::get('/edit/{yachtType}', 'edit')->name('edit');
    Route::get('/update/{yachtType}', 'update')->name('update');
    Route::get('/destroy/{yachtType}', 'destroy')->name('destroy');
});
