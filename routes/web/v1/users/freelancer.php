<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\FreelancerController;

Route::prefix('/user')->name('user.')->controller(FreelancerController::class)->group(function() {
    Route::get('/freelancer', 'index')->name('index');
});
