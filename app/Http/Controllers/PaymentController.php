<?php

namespace App\Http\Controllers;

use App\Service\Transaction\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private Transaction $transaction,
    ) {

    }

    public function verify(Request $request)
    {
        if (! $this->transaction->verify($request)) {
            return redirect()->route('index')->with('error', __('payment.transaction failed'));
        }

        return redirect()->route('index')->with('success', __('payment.transaction success'));
    }
}
