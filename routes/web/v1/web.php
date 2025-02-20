<?php

use App\Http\Controllers\Web\Backend\V1\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
});



Route::prefix('/admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.layouts.dashboard.index');
    })->middleware(['auth', 'web.verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
    require __DIR__.'/users/admin.php';
    require __DIR__.'/users/cure.php';
    require __DIR__.'/users/freelancer.php';
    require __DIR__.'/users/supplier.php';
    require __DIR__.'/users/yacth.php';

});

