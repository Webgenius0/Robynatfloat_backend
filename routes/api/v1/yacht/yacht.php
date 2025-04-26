<?php

use App\Http\Controllers\API\V1\Yacht\SkillController;
use App\Http\Controllers\API\V1\Yacht\YachtCrewController;
use App\Http\Controllers\API\V1\Yacht\YachtDashboardController;
use App\Http\Controllers\API\V1\Yacht\YachtFreelancerController;
use App\Http\Controllers\API\V1\Yacht\YachtJobController;
use App\Http\Controllers\API\V1\Yacht\YachtManageApplicationController;
use App\Http\Controllers\API\V1\Yacht\YachtSupplierController;
use App\Http\Controllers\API\V1\Yacht\YachtSupplierOrderController;
use Illuminate\Support\Facades\Route;

// This route is for the Yacht Job API in the Yacht dashboard.
Route::middleware('auth:api')->group(function () {


    //YachtDashboard Route List
    Route::controller(YachtDashboardController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/active-job', 'activeJob');
        Route::get('/pending-application', 'pendingApplication');
        Route::get('/job-application', 'getJobApplication');
    });
//YachtJob Route List
    Route::controller(YachtJobController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/job', 'getAllJobsStatusBased');
        Route::post('/job', 'store');
        Route::get('/job/{job}', 'show');
        Route::patch('/job/{job}', 'update');
        Route::delete('/job/{slug}', 'destroy');
        // Route::get('/all-suppler', 'getAllSupplier');
    });

    Route::controller(SkillController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/skills', 'index');
    });

    //Yacht Manage Application Route List
    Route::controller(YachtManageApplicationController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/application', 'getJobApplication');
        Route::get('/application/{slug}', 'getApplicationBySlug');
        // Route::patch('/application/{id}', 'updateApplication');
        Route::delete('/application/{id}', 'deleteApplication');
    });

    Route::controller(YachtSupplierController::class)->prefix('v1/yacht')->group(function () {
        Route::get('/supplier', 'getAllSupplier');
        Route::get('/single-supplier/{id}', 'getSupplierBySlug');
        Route::get('/supplier/products', 'getSupplierProducts');
        Route::get('/supplier/products/{slug}', 'getSupplierProductBySlug');
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
