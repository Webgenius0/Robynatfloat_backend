<?php

// app/Services/API/V1/Payment/PaymentService.php
namespace App\Services\API\V1\Payment;

use Stripe\PaymentIntent;
use Stripe\Stripe;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public function createSplitPayment($payable, $amount, $connectedAccountId,$user)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
// dd($connectedAccountId);
            // Convert to cents if needed
            $amountInCents = $amount * 100;

            // Create Payment Intent
            $paymentIntent = PaymentIntent::create([

                'amount' => $amountInCents,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'transfer_data' => [
                    'destination' => $connectedAccountId,
                    'amount' => round($amountInCents * 0.9), // 90% to supplier, 10% to platform
                ],
            ]);
dd($paymentIntent);
            // Store the payment record
            $payment = $payable->payments()->create([
                'user_id' => $user->id,
                'amount' => $amountInCents,
                'currency' => 'usd',
                'stripe_payment_intent_id' => $paymentIntent->id,
                'status' => 'pending',
            ]);

            return $paymentIntent->client_secret;

        } catch (Exception $e) {
            // Log the error
            Log::error('PaymentService::createSplitPayment', ['error' => $e->getMessage()]);
            throw new Exception('Failed to create payment intent.');
        }
    }
}
