<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\V1\User\AdminController;

Route::prefix('/user/admin')->name('user.admin.')->controller(AdminController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/updateStatus/{id}', 'updateStatus')->name('updateStatus');
});
