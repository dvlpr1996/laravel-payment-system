<?php

namespace App\Http\Controllers;

use App\Service\Basket\Basket;
use App\Service\Transaction\Transaction;
use App\Http\Requests\BasketCheckOutRequest;

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
        $this->transaction->checkOut($request);

        return redirect()->route('index')->with('success', __('payment.offline payment ok'));
    }
}
