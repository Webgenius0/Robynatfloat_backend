<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\CrueController;

Route::prefix('/user/crue')->name('user.crue.')->controller(CrueController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/update-status/{user:handle}', 'updateStatus')->name('update.status');
    // Route::post('/update-status/{user:handle}', 'updateStatus')->name('update.status');
});
