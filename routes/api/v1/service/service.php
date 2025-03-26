<?php

use App\Http\Controllers\API\V1\Service\ServiceController;
use Illuminate\Support\Facades\Route;



    //profile Update routes

    Route::middleware('auth:api')->group(function () {
        // Profile Update - Only accessible to logged-in users
        Route::controller(ServiceController::class)->prefix('v1/service')->group(function () {
            Route::post('/store', 'serviceStore');
            Route::get('/index', 'serviceIndex');
            Route::get('/show/{slug}', 'serviceShow');
            Route::put('/update/{slug}', 'serviceUpdate');
            Route::delete('/destroy/{slug}', 'serviceDelete');
        });
    });
