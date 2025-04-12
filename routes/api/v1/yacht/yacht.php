<?php

use App\Http\Controllers\API\V1\Yacht\SkillController;
use App\Http\Controllers\API\V1\Yacht\YachtJobController;
use Illuminate\Support\Facades\Route;

// This route is for the Yacht Job API in the Yacht dashboard.
Route::middleware('auth:api')->group(function () {
    Route::controller(YachtJobController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/job', 'index');
        Route::post('/job', 'store');
        Route::get('/job/{job}', 'show');
        Route::patch('/job/{job}', 'update');
    });

    Route::controller(SkillController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/skills', 'index');
    });
});
