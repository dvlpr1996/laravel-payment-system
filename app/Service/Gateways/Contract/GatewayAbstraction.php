<?php

namespace App\Service\Gateways\Contract;

use App\Models\Order;
use Illuminate\Http\Request;

abstract class GatewayAbstraction implements GatewayInterface
{
    abstract public function pay(Order $order);

    abstract public function verify(Request $request);

    protected function sendOrderDataToBank(Order $order)
    {
        $action = config('payment.bankAction');
        $bankId = $this->getGatewayName() . 'payment';
        $amount = $order->amount + config('payment.transportationCosts');

        echo "<form id='{$bankId}' action='{$action}' method='POST'>
            <input type='hidden' name='Amount' value='{$amount}' />
            <input type='hidden' name='ResNum' value='{$order->code}'>
            <input type='hidden' name='RedirectURL' value='{$this->callbackRoute()}'/>
            <input type='hidden' name='MID' value='{$this->merchantID()}'/>
            </form><script>document.forms['{$bankId}'].submit()</script>";
    }

    protected function getGatewayName(): string
    {
        return strtolower(last(explode('\\', get_class($this))));
    }

    protected function merchantID(): string
    {
        return config('payment.merchantID');
    }

    protected function callbackRoute(): string
    {
        return route('payment.verified', $this->getGatewayName());
    }

    protected function findOrder(string $resNum)
    {
        return Order::where('code', $resNum)->firstOrFail();
    }
}
