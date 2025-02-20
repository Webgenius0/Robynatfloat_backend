<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\YacthController;

Route::prefix('/user')->name('user.')->controller(YacthController::class)->group(function() {
    Route::get('/yacth', 'index')->name('index');
});
