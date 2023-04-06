<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Transaction\Transaction;
use App\Http\Requests\BasketCheckOutRequest;

class PaymentController extends Controller
{
    public function __construct(
        private Transaction $transaction
    ) {
    }

    public function verify(Request $request)
    {
        if (!$this->transaction->verify($request)) {
            return redirect()->route('index')->with('error', __('payment.transaction failed'));
        }
        return redirect()->route('index')->with('success', __('payment.transaction success'));
    }
}
