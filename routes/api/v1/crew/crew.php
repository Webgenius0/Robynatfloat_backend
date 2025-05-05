<?php

use App\Http\Controllers\API\V1\Crew\CrewDashboardController;
use App\Http\Controllers\API\V1\Crew\CrewJobController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api','api.verified'])->group(function () {

//Crew Dashboard route
Route::controller(CrewDashboardController::class)->prefix('v1/crew')->group(function () {
    Route::get('/total-application', 'totalApplication');
});

//crew Job route

Route::controller(CrewJobController::class)->prefix('v1/crew')->group(function () {
    Route::get('/suggest-job', 'getAllJobsStatusBased');
    Route::get('/suggest-job/{slug}', 'getJobBySlug');
    Route::post('/apply-job/{job}', 'applyToJob');
    Route::get('/applied-job', 'getAppliedJobs');
    Route::get('/applied-job/{slug}', 'getAppliedJobBySlug');
});



});
