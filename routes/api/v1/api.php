<?php

use App\Http\Controllers\API\V1\AllUserListCountController;
use App\Http\Controllers\API\V1\ChatController;
use App\Http\Controllers\API\V1\PaymentController;
use App\Http\Controllers\Web\Backend\V1\Dashboard\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//! Message Routes
Route::middleware(['auth:api', 'api.verified'])
    ->prefix('v1') 
    ->group(function () {
        Route::get('/messages/{user}', [ChatController::class, 'GetMessages']);
        Route::post('/send-messages/{user}', [ChatController::class, 'SendMessage']);
        Route::get('/users-with-last-message', [ChatController::class, 'GetUsersWithLastMessage']);
    });
    Route::prefix('v1')->group(function () {
        Route::get('/all-user-count',[AllUserListCountController::class, 'getAllUserCount'])->name('all.user.count');
    });






//Payment Routes




require __DIR__.'/auth.php';
// require __DIR__.'/service/service.php';
require __DIR__.'/yacht/yacht.php';
require __DIR__.'/freelancer/freelancer.php';
require __DIR__.'/supplier/supplier.php';
require __DIR__.'/crew/crew.php';
require __DIR__.'/payment/payment.php';
require __DIR__.'/blog/blog.php';
