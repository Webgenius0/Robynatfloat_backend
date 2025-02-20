<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\AdminController;

Route::prefix('/user')->name('user.')->controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index')->name('index');
});
