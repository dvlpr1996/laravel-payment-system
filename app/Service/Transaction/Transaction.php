<?php

namespace App\Service\Transaction;

use App\Events\PaymentEvent;
use App\Http\Requests\BasketCheckOutRequest;
use App\Models\Order as ModelOrder;
use App\Service\Basket\Basket;
use App\Service\Gateways\Contract\GatewayInterface;
use App\Service\Gateways\Pasargad;
use App\Service\Gateways\Saman;
use App\Service\Order\Order;
use App\Service\Payment\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $order = $this->order->createOrder();

        DB::beginTransaction();

        try {

            if ($request->paymentMethod === 'cash') {
                $this->payment->offlinePayment($order, $request);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return null;
        }

        if ($request->paymentMethod === 'online') {
            return $this->gatewayFactory($request)->pay($order);
        }

        $this->finishPayment($order);

        return $order;
    }

    public function verify(Request $request)
    {
        $result = $this->gatewayFactory($request)->verify($request);

        if ($result['status'] === GatewayInterface::TRANSACTION_FAILED) {
            return false;
        }

        $this->payment->onlinePayment($result);

        $this->finishPayment($result['order']);

        return true;
    }

    private function finishPayment($order)
    {
        $this->updateQuantity($order);

        $this->basket->clearBasket();

        $order->createInvoice();

        event(new PaymentEvent($order));
    }

    private function gatewayFactory(?Request $request = null)
    {
        if (is_null($request)) {
            return resolve(Saman::class);
        }

        $gateway = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class,
        ][$request->gateway];

        return resolve($gateway);
    }

    public function unfinished(ModelOrder $order)
    {
        return $this->gatewayFactory()->pay($order);
    }

    private function updateQuantity(ModelOrder $order)
    {
        foreach ($order->products as $product) {
            $product->decrementStock($product->pivot->quantity);
        }
    }
}
