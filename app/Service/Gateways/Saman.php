<?php

namespace App\Service\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Service\Gateways\Contract\GatewayAbstraction;

class Saman extends GatewayAbstraction
{
    public function pay(Order $order)
    {
        $this->sendOrderDataToBank($order);
    }

    public function verify(Request $request)
    {
        // if (!$request->has('State') || $request->input('State') !== "OK") {
        //     return [
        //         'status' => self::TRANSACTION_FAILED
        //     ];
        // }
    }
}
