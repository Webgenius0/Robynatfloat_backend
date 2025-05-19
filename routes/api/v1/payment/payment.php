<?php

use App\Http\Controllers\API\V1\Payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::controller(PaymentController::class)->prefix('v1/payment')->group(function () {
    Route::get('/subscription', 'getSubscription');
    Route::post('/create-payment/{type}/{id}/{user_id}', 'createPayment');
    Route::get('/success', 'paymentSuccess')->name('payment.success');
    Route::get('/cancel', 'paymentCancel')->name('payment.cancel');


});
