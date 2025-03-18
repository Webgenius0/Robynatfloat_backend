<?php

use App\Http\Controllers\Web\Backend\V1\Blog\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.layouts.dashboard.index');
    })->middleware(['auth', 'web.verified'])->name('dashboard');

    require __DIR__ . '/auth/auth.php';
//blog  routes
// Route::controller('/blog', BlogController::class)->group(function () {
//     Route::get('/', 'index')->name('blog.index');
//     Route::get('/create', 'create')->name('blog.create');
//     Route::post('/store', 'store')->name('blog.store');
//     Route::get('/edit/{blog:slug}', 'edit')->name('blog.edit');
//     Route::put('/update/{blog:slug}', 'update')->name('blog.update');
//     Route::delete('/destroy/{blog:slug}', 'destroy')->name('blog.destroy');
// });

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
    });
});
