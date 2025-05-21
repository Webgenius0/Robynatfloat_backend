<?php

// app/Http/Controllers/API/V1/Payment/PaymentController.php
namespace App\Http\Controllers\API\V1\Payment;

use App\Http\Controllers\Controller;
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
use Stripe\Checkout\Session;
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
        'currency' => 'required|string|in:usd',
        'success_url' => 'required|url',
        'cancel_url' => 'required|url',
    ]);

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

    try {
        // Set Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $request->currency,
                    'product_data' => [
                        'name' => ucfirst($type) . ' #' . $id,
                        'description' => "Payment for {$type} ID {$id}",
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $request->success_url . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => $request->cancel_url,
            'metadata' => [
                'type' => $type,
                'model_id' => $id,
                'user_id' => $user_id,
            ],
        ]);

        // Store the payment record as pending
        $payable->payments()->create([
            'user_id' => $user_id,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'status' => 'pending',
            'payment_intent_id' => $session->payment_intent, // Note: Stripe Checkout creates PaymentIntent internally
        ]);

        return response()->json([
            'payment_url' => $session->url,
            'message' => 'Checkout session created successfully.',
        ], 201);

    } catch (\Exception $e) {
        Log::error('Stripe Error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to create payment session.'], 500);
    }
}

public function paymentSuccess(Request $request)
{
    $session_id = $request->query('session_id');

    if (!$session_id) {
        return response()->json([
            'message' => 'Payment session not found',
        ], 404);
    }

    return response()->json([
        'message' => 'Payment successful',
        'session_id' => $session_id,
    ]);
}

public function paymentCancel()
{
    return response()->json([
        'message' => 'Payment canceled by user',
    ]);
}
}
