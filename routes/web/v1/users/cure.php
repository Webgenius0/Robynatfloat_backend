<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\CrueController;

Route::prefix('/user')->name('user.')->controller(CrueController::class)->group(function() {
    Route::get('/crue', 'index')->name('index');
});
