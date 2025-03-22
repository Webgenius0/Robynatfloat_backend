<?php

use App\Http\Controllers\API\V1\Service\ServiceController;
use Illuminate\Support\Facades\Route;



    //profile Update routes
    
    Route::middleware('auth:api')->group(function () {
        // Profile Update - Only accessible to logged-in users
        Route::controller(ServiceController::class)->group(function () {
            Route::post('/service-store', 'serviceStore')->name('service.store');
        });
    });
