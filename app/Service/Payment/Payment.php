<?php

namespace App\Service\Payment;

use App\Models\Order;
use App\Service\Basket\Basket;
use App\Models\Payment as ModelsPayment;
use App\Http\Requests\BasketCheckOutRequest;


class Payment
{
    public function __construct(
        private Basket $basket
    ) {
    }

    public function createOfflinePayment(Order $order, BasketCheckOutRequest $request)
    {
        ModelsPayment::create([
            'order_id' => $order->id,
            'method' => $request->paymentMethod,
            'amount' => $this->basket->payableAmount()
        ]);
    }

    public function createOnlinePayment(Order $order, BasketCheckOutRequest $request)
    {
        ModelsPayment::create([
            'order_id' => $order->id,
            'method' => $request->paymentMethod,
            'amount' => $this->basket->payableAmount()
        ]);
    }
}
