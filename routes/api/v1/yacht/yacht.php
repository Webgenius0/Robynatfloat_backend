<?php

use App\Http\Controllers\API\V1\Yacht\SkillController;
use App\Http\Controllers\API\V1\Yacht\YachtCrewController;
use App\Http\Controllers\API\V1\Yacht\YachtFreelancerController;
use App\Http\Controllers\API\V1\Yacht\YachtJobController;
use App\Http\Controllers\API\V1\Yacht\YachtSupplierController;
use App\Http\Controllers\API\V1\Yacht\YachtSupplierOrderController;
use Illuminate\Support\Facades\Route;

// This route is for the Yacht Job API in the Yacht dashboard.
Route::middleware('auth:api')->group(function () {
    Route::controller(YachtJobController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/job', 'index');
        Route::post('/job', 'store');
        Route::get('/job/{job}', 'show');
        Route::patch('/job/{job}', 'update');
        // Route::get('/all-suppler', 'getAllSupplier');
    });

    Route::controller(SkillController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/skills', 'index');
    });

    Route::controller(YachtSupplierController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/all-supplier', 'getAllSupplier');
        Route::get('/single-supplier/{id}', 'getSupplierBySlug');
    });
    Route::controller(YachtSupplierOrderController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/order', 'getOrders');
        Route::post('/order', 'storeOrder');
        Route::get('/order/{id}', 'getOrderById');
        Route::patch('/order/{order}', 'update');
    });
    Route::controller(YachtCrewController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/crew', 'getAllCrew');
        Route::get('/crew/{id}', 'getCrewById');
        // Route::get('/crew/{crew}', 'show');
        // Route::patch('/crew/{crew}', 'update');
    });

    Route::controller(YachtFreelancerController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/freelancer', 'getAllFreelancer');
        Route::get('/freelancer/{id}', 'getFreelancerById');
    });

});
