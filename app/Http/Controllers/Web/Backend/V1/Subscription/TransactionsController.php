<?php

namespace App\Http\Controllers\Web\Backend\V1\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
      $payments = Payment::with('user', 'payable')->latest()->get();

        return view('backend.layouts.subscription.transactions.index', compact('payments'));
    }
}
