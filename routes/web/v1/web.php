<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.layouts.dashboard.index');
    })->middleware(['auth', 'web.verified'])->name('dashboard');

    require __DIR__ . '/auth/auth.php';
    Route::name('admin.')->group(function () {
        // user routes
        require __DIR__ . '/users/admin.php';
        require __DIR__ . '/users/cure.php';
        require __DIR__ . '/users/freelancer.php';
        require __DIR__ . '/users/supplier.php';
        require __DIR__ . '/users/yacth.php';

        // dropdown
        require __DIR__ . '/dropdown/yacht_type.php';
        require __DIR__ . '/dropdown/country.php';
    });
});
