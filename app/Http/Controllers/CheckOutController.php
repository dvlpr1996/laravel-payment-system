<?php

namespace App\Http\Controllers;

use App\Service\Order\Order;
use App\Service\Basket\Basket;
use App\Service\Payment\Payment;
use App\Exceptions\AmountIsZeroException;
use App\Service\Transaction\Gateways\Saman;
use App\Http\Requests\BasketCheckOutRequest;
use App\Service\Transaction\Gateways\Pasargad;

class CheckOutController extends Controller
{
    public function __construct(
        private Order $order,
        private Payment $payment,
        private Basket $basket,
    ) {
    }

    public function index()
    {
        return view('app.checkout');
    }

    public function checkOut(BasketCheckOutRequest $request)
    {
        try {
            $order = $this->order->createOrder();

            if ($request->paymentMethod !== 'online') {
                $this->payment->createOfflinePayment($order, $request);

                $this->basket->clearBasket();

                return redirect()->route('index')->with(
                    'success',
                    __('payment.offline payment ok', ['orderId' => $order->id])
                );
            }

            dd($this->gatewayFactory($request));
        } catch (AmountIsZeroException $e) {
            return back()->with('error', __('payment.amount is zero'));
        }
    }

    private function payOffline()
    {
    }

    private function payOnline()
    {
    }

    private function gatewayFactory(BasketCheckOutRequest $request)
    {
        $gateway = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class
        ][$request->gateway];

        return resolve($gateway);
    }
}
