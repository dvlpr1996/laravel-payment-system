<?php

namespace App\Http\Controllers;

use App\Service\Order\Order;
use App\Service\Basket\Basket;
use App\Service\Gateways\Saman;
use App\Service\Payment\Payment;
use App\Service\Gateways\Pasargad;
use App\Exceptions\AmountIsZeroException;
use App\Http\Requests\BasketCheckOutRequest;

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

            if ($request->paymentMethod === 'online') {
                $this->gatewayFactory($request)->pay($order);
            }

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
