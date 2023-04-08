<?php

namespace App\Service\Payment;

use App\Http\Requests\BasketCheckOutRequest;
use App\Models\Order;
use App\Models\Payment as ModelsPayment;
use App\Service\Basket\Basket;

class Payment
{
    public function __construct(
        private Basket $basket
    ) {
    }

    public function offlinePayment(Order $order, BasketCheckOutRequest $request)
    {
        ModelsPayment::create([
            'order_id' => $order->id,
            'method' => $request->paymentMethod,
            'amount' => $this->basket->payableAmount(),
        ]);
    }

    public function onlinePayment($result)
    {
        $onlinePaymentData = [
            'ref_num' => $result['refNum'],
            'gateway' => $result['gateway'],
            'status' => 1,
            'method' => 'online',
            'amount' => $result['order']->amount + config('payment.transportationCosts'),
        ];

        $result['order']->payment()->create($onlinePaymentData);
    }
}
