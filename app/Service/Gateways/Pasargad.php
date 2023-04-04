<?php

namespace App\Service\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Service\Gateways\Contract\GatewayInterface;

class Pasargad implements GatewayInterface
{
    public function pay(Order $order)
    {
    }

    public function verify(Request $request)
    {

    }

    public function getName(): string
    {
        return '';
    }
}
