<?php

use App\Http\Controllers\API\V1\Freelancer\FreelancerJobApplicationController;
use App\Http\Controllers\API\V1\Supplier\ServiceController;
use App\Http\Controllers\API\V1\Supplier\ProductSupplierController;
use App\Http\Controllers\API\V1\Supplier\SupplierController;
use App\Http\Controllers\API\V1\Supplier\SupplierDashboardController;
use App\Http\Controllers\API\V1\Supplier\SupplierManageOrderController;
use App\Http\Controllers\API\V1\Supplier\SupplierManageProductController;
use App\Http\Controllers\API\V1\Supplier\SupplierMessageController;
use App\Http\Controllers\API\V1\Supplier\SupplierMyJobController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {



    //Supplier Dashboard controller
    Route::controller(SupplierDashboardController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/total-order', 'getTotalOrder');
        Route::get('/total-product', 'getTotalProduct');
        Route::get('/total-job-application', 'getTotalJobApplication');
    });

    //supplier My Job Controller
    Route::controller(SupplierMyJobController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/suggested-job', 'getSuggestedJob');
        Route::get('/suggested-job/{slug}', 'getSuggestedJobBySlug');
        Route::post('/apply-job/{job}', 'applyToJob');
        Route::get('/applied-job', 'getAppliedJobs');
        Route::get('/applied-job/{slug}', 'getAppliedJobBySlug');
    });


    //Supplier Manage Products Controller
    Route::controller(SupplierManageProductController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/all-supplier-product', 'getAllProduct');
        Route::post('/supplier-product', 'addSupplierProduct');
        Route::get('/supplier-product/{slug}', 'getSupplierProductById');
        Route::post('/supplier-product/{slug}', 'updateSupplierProduct');
        Route::delete('/supplier-product/{slug}', 'deleteSupplierProduct');
    });

    //Supplier Manage Order Controller
    Route::controller(SupplierManageOrderController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/all-supplier-order', 'getAllOrder');
        // Route::post('/supplier-order', 'addSupplierOrder');
        Route::get('/supplier-order/{slug}', 'getSupplierOrderById');
        Route::put('/supplier-order/{slug}', 'updateSupplierOrderStatus');
        Route::delete('/supplier-order/{slug}', 'deleteSupplierOrder');

    });
    //Supplier Message Controller
    Route::controller(SupplierMessageController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/message', 'getAllMessage');
        Route::post('/message', 'addMessage');
});


    // Route::controller(ProductSupplierController::class)->prefix('v1/supplier')->group(function () {
    //     Route::get('/supplier-product', 'getAllSupplierProduct');
    //     Route::post('/supplier-product', 'addSupplierProduct');
    //     Route::get('/supplier-product/{slug}', 'getSupplierProductById');
    //     Route::post('/supplier-product/{slug}', 'updateSupplierProduct');
    //     Route::delete('/supplier-product/{slug}', 'deleteSupplierProduct');

    // });
    // Route::middleware('auth:api')->group(function () {
    //     // Profile Update - Only accessible to logged-in users
    //     Route::controller(ServiceController::class)->prefix('v1/service')->group(function () {
    //         Route::post('/store', 'serviceStore');
    //         Route::get('/index', 'serviceIndex');
    //         Route::get('/show/{slug}', 'serviceShow');
    //         Route::put('/update/{slug}', 'serviceUpdate');
    //         Route::delete('/destroy/{slug}', 'serviceDelete');
    //     });
    // });


});

