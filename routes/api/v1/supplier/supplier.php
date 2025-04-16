<?php

use App\Http\Controllers\API\V1\Supplier\ServiceController;
use App\Http\Controllers\API\V1\Supplier\ProductSupplierController;
use App\Http\Controllers\API\V1\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {

    // Supplier
    // Route::controller(SupplierController::class)->prefix('v1/supplier')->group(function () {
    //     Route::get('/all-suppler', 'getAllSupplier');
    //     Route::post('/supplier', 'addSupplier');
    //     Route::get('/supplier/{slug}', 'getSupplierById');
    //     Route::post('/supplier/{slug}', 'updateSupplier');
    //     Route::delete('/supplier/{slug}', 'deleteSupplier');
    // });
    Route::controller(ProductSupplierController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/supplier-product', 'getAllSupplierProduct');
        Route::post('/supplier-product', 'addSupplierProduct');
        Route::get('/supplier-product/{slug}', 'getSupplierProductById');
        Route::post('/supplier-product/{slug}', 'updateSupplierProduct');
        Route::delete('/supplier-product/{slug}', 'deleteSupplierProduct');

    });
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


});

