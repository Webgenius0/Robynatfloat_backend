<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\FreelancerController;

Route::prefix('/user/freelancer')->name('user.freelancer.')->controller(FreelancerController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/update-status/{user:handle}','updateStatus')->name('update.status');
});
