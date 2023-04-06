<?php

namespace App\Service\Transaction;

use App\Service\Order\Order;
use Illuminate\Http\Request;
use App\Service\Basket\Basket;
use App\Service\Gateways\Saman;
use App\Service\Payment\Payment;
use App\Service\Gateways\Pasargad;
use Illuminate\Support\Facades\DB;
use App\Models\Order as ModelOrder;
use App\Http\Requests\BasketCheckOutRequest;
use App\Service\Gateways\Contract\GatewayInterface;

class Transaction
{
    public function __construct(
        private Order $order,
        private Payment $payment,
        private Basket $basket,
    ) {
    }

    public function checkOut(BasketCheckOutRequest $request)
    {
        DB::beginTransaction();

        try {
            $order = $this->order->createOrder();

            if ($request->paymentMethod === 'cash') {
                $this->payment->createOfflinePayment($order, $request);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return null;
        }

        if ($request->paymentMethod === 'online') {
            return $this->gatewayFactory($request)->pay($order);
        }

        $this->updateQuantity($order);

        $this->basket->clearBasket();

        return $order;
    }

    private function updateQuantity(ModelOrder $order)
    {
        foreach ($order->products as $product) {
            $product->decrementStock($product->pivot->quantity);
        }
    }

    private function gatewayFactory(Request $request)
    {
        $gateway = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class
        ][$request->gateway];

        return resolve($gateway);
    }

    public function verify(Request $request)
    {
        $result = $this->gatewayFactory($request)->verify($request);

        if ($result['status'] === GatewayInterface::TRANSACTION_FAILED) {
            return false;
        }

        $onlinePaymentData = [
            'ref_num' => $result['refNum'],
            'gateway' => $result['gateway'],
            'status' => 1,
            'method' => 'online',
            'amount' => $result['order']->amount + config('payment.transportationCosts'),
        ];

        $result['order']->payment()->create($onlinePaymentData);

        $this->updateQuantity($result['order']);

        $this->basket->clearBasket();

        return true;
    }
}
