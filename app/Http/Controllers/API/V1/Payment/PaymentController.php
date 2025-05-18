<?php

// app/Http/Controllers/API/V1/Payment/PaymentController.php
namespace App\Http\Controllers\API\V1\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Payment\PaymentRequest;
use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Services\API\V1\Payment\PaymentService;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;

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

    public function CreatePayment(PaymentRequest $request)
    {
        try {

            $paymentData = $request->validated();
            $type = $paymentData['type'];
            $id = $paymentData['id'];
            $amount = $paymentData['amount'];

            // Get the authenticated user
        $user = Auth::user();

        // Fetch the connected account ID from the user's profile
        $connectedAccountId = $user->stripe_account_id;


            // Get the correct payable model
            if ($type === 'plan') {
                $payable = Plan::findOrFail($id);
            } elseif ($type === 'order') {
                $payable = Order::findOrFail($id);
            } else {
                return response()->json(['error' => 'Invalid payable type'], 400);
            }
// dd($payable);
            // Create the payment
            $clientSecret = $this->paymentService->createSplitPayment($payable, $amount, $connectedAccountId,$user);

            return $this->success(200, 'Payment Intent Created', ['clientSecret' => $clientSecret]);

        } catch (Exception $e) {
            Log::error('PaymentController::Payment', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Payment processing failed.'], 500);
        }
    }
}
