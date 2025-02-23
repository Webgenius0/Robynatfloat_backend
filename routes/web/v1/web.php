<?php

use App\Http\Controllers\Web\Backend\V1\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Web\Backend\V1\Auth\VerifyEmailController;
use App\Http\Controllers\Web\Backend\V1\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});




Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.layouts.dashboard.index');
    })->middleware(['auth', 'web.verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';


    Route::name('admin.')->group(function () {
        require __DIR__ . '/users/admin.php';
        require __DIR__ . '/users/cure.php';
        require __DIR__ . '/users/freelancer.php';
        require __DIR__ . '/users/supplier.php';
        require __DIR__ . '/users/yacth.php';
    });
});
