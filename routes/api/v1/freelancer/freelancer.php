<?php

use App\Http\Controllers\API\V1\Freelancer\FreelancerDashboardController;
use App\Http\Controllers\API\V1\Freelancer\FreelancerJobApplicationController;
use App\Http\Controllers\API\V1\Freelancer\FreelancerProfileController;
use Illuminate\Support\Facades\Route;

// This route is for the freelancer profile API in the freelancer dashboard
// Route::middleware('auth:api')->group(function () {
//     Route::controller(FreelancerProfileController::class)->prefix('v1/freelancer')->group(function () {
//         Route::get('/profile', 'profile');
//         Route::post('/profile', 'updateProfile');
//     });
// });

// Apply to a job
// Route::middleware('auth:api')->group(function () {
//     Route::controller(FreelancerJobApplicationController::class)->prefix('v1/freelancer')->group(function () {
//         Route::post('/job/{job}/apply', 'store');
//         Route::get('/jobs/applied', 'listMyAppliedJobs');
//     });
// });

Route::middleware(['auth:api','api.verified'])->group(function () {

    Route::controller(FreelancerDashboardController::class)->prefix('v1/freelancer')->group(function () {
        Route::get('/total-application', 'totalApplication');
    });

    Route::controller(FreelancerJobApplicationController::class)->prefix('v1/freelancer')->group(function () {
    Route::get('/suggest-job', 'getAllJobsStatusBased');
    Route::get('/suggest-job/{slug}', 'getJobBySlug');
    Route::post('/apply-job/{job}', 'applyToJob');
    Route::get('/applied-job', 'getAppliedJobs');
    Route::get('/applied-job/{slug}', 'getAppliedJobBySlug');
    });
});

