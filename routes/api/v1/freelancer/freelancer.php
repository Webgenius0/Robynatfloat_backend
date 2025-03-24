<?php

use App\Http\Controllers\API\V1\Freelancer\FreelancerProfileController;
use Illuminate\Support\Facades\Route;

// This route is for the freelancer profile API in the freelancer dashboard
Route::middleware('auth:api')->group(function () {
    Route::controller(FreelancerProfileController::class)->prefix('v1/freelancer')->group(function () {
        Route::get('/profile', 'profile');
        Route::post('/profile', 'updateProfile');
    });
});
