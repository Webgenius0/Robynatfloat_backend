<?php

use App\Http\Controllers\API\V1\Yacht\YachtJobController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::controller(YachtJobController::class)->prefix('yacht')->group(function () {
        Route::get('/job', 'index');
        Route::post('/job', 'store');
        Route::get('/job/{id}', 'show');
        Route::patch('/job/{id}', 'update');
    });
});
