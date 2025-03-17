<?php

use App\Http\Controllers\Web\Backend\V1\Blog\BlogController;
use Illuminate\Support\Facades\Route;


Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{blog:slug}', 'edit')->name('edit');
    Route::put('/update/{blog:slug}', 'update')->name('update');
    Route::delete('/destroy/{blog:slug}', 'destroy')->name('destroy');
});

