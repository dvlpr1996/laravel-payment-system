<?php

namespace App\Service\Gateways;

use App\Models\Order;
use App\Service\Gateways\Contract\GatewayAbstraction;
use Illuminate\Http\Request;

class Pasargad extends GatewayAbstraction
{
    public function pay(Order $order)
    {
        return 'Pasargad pay';
    }

    public function verify(Request $request)
    {
        return 'Pasargad verify';
    }
}
