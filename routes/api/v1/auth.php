<?php

use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\Auth\ForgerPasswordController;
use App\Http\Controllers\API\V1\Auth\OTPController;
use App\Http\Controllers\API\V1\Auth\PasswordController;
use App\Http\Controllers\API\V1\Freelancer\FreelancerProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1/auth')->name('api.v1.auth.')->group(function () {
    Route::get('/get-user', [AuthController::class, 'getUser'])->name('get.user')->middleware('auth:api');
    // Guest routes - Accessible by unauthenticated users only

    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
        // Password-related routes
        Route::controller(PasswordController::class)->group(function () {
            Route::post('/chage-password', 'changePassword')->name('change.password');
        });

        // OTP-related routes
        Route::prefix('/forget-password')->name('forgetpassword.')->controller(OTPController::class)->group(function () {
            Route::post('/otp-send', 'otpSend')->name('otp.send');
            Route::post('/otp-match', 'otpMatch')->name('otp.match');
        });

        Route::prefix('/forget-password')->name('forgetpassword.')->controller(ForgerPasswordController::class)->group(function () {
            Route::post('/reset-password', 'resetPassword')->name('reset.password');
        });
    });



    // Authenticated routes - Accessible only by authenticated users
    Route::middleware(['auth:api'])->group(function () {
        // Authentication-related routes
        Route::controller(AuthController::class)->group(function () {
            Route::post('/logout', 'logout')->name('logout');
            Route::post('/refresh', 'refresh')->name('refresh.token');
        });
        // OTP-related routes
        Route::controller(OTPController::class)->group(function () {
            Route::post('/otp-send', 'otpSend')->name('otp.send');
            Route::post('/otp-match', 'otpMatch')->name('otp.match');
        });
    });

    //profile Update routes
    Route::middleware(['auth:api','api.verified'])->group(function () {
        // Profile Update - Only accessible to logged-in users
        Route::controller(FreelancerProfileController::class)->group(function () {
            Route::post('/profile-update', 'profileUpdate')->name('profile.update');
            // Route::get('/profile-update', 'profile');
        });
    });
    // Route::middleware('auth:api')->group(function () {
    //     Route::controller(::class)->prefix('v1/freelancer')->group(function () {

    //         Route::post('/profile', 'updateProfile');
    //     });
    // });
});
