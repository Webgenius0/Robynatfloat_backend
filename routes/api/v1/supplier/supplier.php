<?php

use App\Http\Controllers\API\V1\Supplier\ProductSupplierController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::controller(ProductSupplierController::class)->prefix('v1/supplier')->group(function () {
        Route::get('/supplier-product', 'getAllSupplierProduct');
        Route::post('/supplier-product', 'addSupplierProduct');
        Route::get('/supplier-product/{slug}', 'getSupplierProductById');
        Route::post('/supplier-product/{slug}', 'updateSupplierProduct');
        Route::delete('/supplier-product/{slug}', 'deleteSupplierProduct');

    });
});

