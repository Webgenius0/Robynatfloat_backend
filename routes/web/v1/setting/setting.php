<?php

use App\Http\Controllers\Web\Backend\V1\Dropdown\Citycontroller;
use App\Http\Controllers\Web\Backend\V1\Setting\MailSettingController;
use Illuminate\Support\Facades\Route;

/**
 * route  for City
 */

 Route::prefix('/setting/mail')->name('setting.mail.')->controller(MailSettingController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{city:slug}', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/destroy/{city:slug}', 'destroy')->name('destroy');
});
