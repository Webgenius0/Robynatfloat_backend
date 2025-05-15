<?php

use App\Http\Controllers\Web\Backend\Subscription\V1\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('/subscription/plan')->name('subscription.plan.')->controller(PlanController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{plan:slug}', 'edit')->name('edit');
    Route::put('/update/{plan:slug}', 'update')->name('update');
    Route::delete('/destroy/{plan:slug}', 'destroy')->name('destroy');
});
