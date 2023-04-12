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
        $transaction = $this->transaction->verify($request);

        return $transaction
            ? redirect()->route('index')->with('success', __('payment.transaction success'))
            : redirect()->route('index')->with('error', __('payment.transaction failed'));
    }
}
