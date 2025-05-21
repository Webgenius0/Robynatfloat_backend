<?php

use App\Http\Controllers\API\V1\Blog\BlogController;
use Illuminate\Support\Facades\Route;

 Route::controller(BlogController::class)->prefix('v1/blog')->group(function () {
        Route::get('/all-blog', 'getAllBlog');
        Route::get('/single-blog/{slug}', 'getSingleBlog');
        // Route::get('/total-job-application', 'getTotalJobApplication');
    });
