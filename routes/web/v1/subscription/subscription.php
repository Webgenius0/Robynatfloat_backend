<?php

use App\Http\Controllers\Web\Backend\V1\Subscription\FeaturePlanController;
use App\Http\Controllers\Web\Backend\V1\Subscription\PlanController;
use App\Http\Controllers\Web\Backend\V1\Subscription\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/subscription/plan')->name('subscription.plan.')->controller(PlanController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{plan:slug}', 'edit')->name('edit');
    Route::put('/update/{plan:slug}', 'update')->name('update');
    Route::delete('/destroy/{plan:slug}', 'destroy')->name('destroy');
});

Route::prefix('/subscription/featurePlan')->name('subscription.featurePlan.')->controller(FeaturePlanController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{featurePlan:slug}', 'edit')->name('edit');
    Route::put('/update/{featurePlan:slug}', 'update')->name('update');
    Route::delete('/destroy/{featurePlan:slug}', 'destroy')->name('destroy');
});

Route::prefix('/subscription/transactions')->name('subscription.transactions.')->controller(TransactionsController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{featurePlan:slug}', 'edit')->name('edit');
    Route::put('/update/{featurePlan:slug}', 'update')->name('update');
    Route::delete('/destroy/{featurePlan:slug}', 'destroy')->name('destroy');
});
