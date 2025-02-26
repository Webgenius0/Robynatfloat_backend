<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\YacthController;

Route::prefix('/user/yacth')->name('user.yacth.')->controller(YacthController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/update-status/{user:handle}', 'updateStatus')->name('update.status');
});
