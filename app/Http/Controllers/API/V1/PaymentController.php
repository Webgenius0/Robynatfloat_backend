<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller

   {
    public function Payment(Request $request)
    {


        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $amount = $request->input('amount');
            $currency = $request->input('currency', 'usd');
            $destinationAccount = $request->input('destination_account');

            if (!$amount || !$destinationAccount) {
                return response()->json(['error' => 'Amount and destination account are required.'], 400);
            }

            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'payment_method_types' => ['card'],
                'transfer_data' => [
                    'destination' => $destinationAccount,
                ],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
                'amount' => $amount,
                'currency' => $currency,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Stripe Payment Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
}
