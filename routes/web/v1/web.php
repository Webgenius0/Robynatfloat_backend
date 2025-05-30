<?php

use App\Http\Controllers\ResetController;
use App\Http\Controllers\Web\Backend\V1\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/reset', [ResetController::class, 'RunMigrations'])->name('reset');

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'web.verified'])->name('dashboard');
   
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
        require __DIR__ . '/dropdown/location.php';
        // blog routes
        require __DIR__. '/blog/blog.php';
        //settings
        require __DIR__. '/setting/setting.php';
        //subscription
        require __DIR__. '/subscription/subscription.php';
    });
});
