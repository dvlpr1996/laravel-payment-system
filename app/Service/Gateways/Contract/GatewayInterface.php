<?php

namespace App\Service\Gateways\Contract;

use App\Models\Order;
use Illuminate\Http\Request;

interface GatewayInterface
{
    const TRANSACTION_FAILED = 'payment.transaction failed';
    const TRANSACTION_SUCCESS = 'payment.transaction success';

    public function pay(Order $order);
    public function verify(Request $request);
}
