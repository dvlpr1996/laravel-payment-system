<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketCheckOutRequest;
use App\Service\Basket\Basket;
use App\Service\Transaction\Transaction;

class CheckOutController extends Controller
{
    public function __construct(
        private Transaction $transaction,
        private Basket $basket
    ) {
        $this->middleware('EnsureBasketIsNotEmpty');
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
            __('payment.offline payment ok', ['orderId' => $order->id])
        );
    }
}
