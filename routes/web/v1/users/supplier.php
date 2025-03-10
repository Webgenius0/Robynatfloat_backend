<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\SupplierController;

Route::prefix('/user/supplier')->name('user.supplier.')->controller(SupplierController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/update-status/{user:handle}', 'updateStatus')->name('update.status');
});
