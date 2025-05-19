<?php

// app/Http/Controllers/API/V1/Payment/PaymentController.php
namespace App\Http\Controllers\API\V1\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Payment\PaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Subscription;
use App\Models\User;
use App\Services\API\V1\Payment\PaymentService;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function getSubscription()
    {
        try {
            $planFeatures = PlanFeature::with(['plan', 'feature'])->latest()->get();
            return $this->success(200, 'Plan Features', $planFeatures);
        } catch (Exception $e) {
            Log::error('PaymentController::getSubscription', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to fetch plan features'], 500);
        }
    }

    public function createPayment(Request $request, $type, $id, $user_id)
    {
        // Validate the incoming request
        $request->validate([
            'amount' => 'required|integer|min:1',
            'currency' => 'required|string|size:3',
        ]);
// dd($request);
        // Map the type to the model
        $modelClass = match ($type) {
            'plan' => Plan::class,
            'order' => Order::class,
            default => null,
        };

        if (!$modelClass) {
            return response()->json(['error' => 'Invalid payment type.'], 400);
        }

        // Fetch the payable model
        $payable = $modelClass::find($id);
        if (!$payable) {
            return response()->json(['error' => 'Payable item not found.'], 404);
        }

        // Fetch the user
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
// dd($user);
        try {
            // Set Stripe secret key
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a payment intent with split payments
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount,
                'currency' => $request->currency,
                'automatic_payment_methods' => ['enabled' => true],
                'metadata' => [
                    'type' => $type,
                    'model_id' => $id,
                    'user_id' => $user_id,
                ],
            ]);

            // dd($paymentIntent);

            // Store the payment in the database
            $payable->payments()->create([
                'user_id' => $user_id,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'status' => 'pending',
                'payment_intent_id' => $paymentIntent->id,
            ]);

            // Return the client secret
            return response()->json([
                'payment_url' => route('stripe.checkout', ['payment_intent' => $paymentIntent->id]),
                'client_secret' => $paymentIntent->client_secret,
                'message' => 'Payment initiated successfully.',
            ], 201);

        } catch (\Exception $e) {
            Log::error('Stripe Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create payment.'], 500);
        }
    }
}
