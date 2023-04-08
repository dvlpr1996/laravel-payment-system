<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketCheckOutRequest;
use App\Service\Transaction\Transaction;

class CheckOutController extends Controller
{
    public function __construct(
        private Transaction $transaction
    ) {
    }

    public function index()
    {
        return view('app.checkout');
    }

    public function checkOut(BasketCheckOutRequest $request)
    {
        $order = $this->transaction->checkOut($request);
        return redirect()->route('index')->with(
            'success',
            __('payment.offline payment ok')
        );
    }
}
