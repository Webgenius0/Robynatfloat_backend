<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\PlanFeature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller

   {

    public function getSubscription(){
        try{
            $planFeatures = PlanFeature::with(['plan', 'feature'])->latest()->get();
            return $this->success(200, 'Plan Features', $planFeatures);

        }catch(Exception $e){
            Log::error('App\Http\Controllers\API\V1\PaymentController::getSubscription', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
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
