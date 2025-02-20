<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\SupplierController;

Route::prefix('/user')->name('user.')->controller(SupplierController::class)->group(function() {
    Route::get('/supplier', 'index')->name('index');
});
