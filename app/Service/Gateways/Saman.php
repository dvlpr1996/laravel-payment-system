<?php

namespace App\Service\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Service\Gateways\Contract\GatewayAbstraction;

class Saman extends GatewayAbstraction
{
    private $samanVerifyUrl = 'https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL';

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

        $soapClient = new \SoapClient($this->samanVerifyUrl);

        $response = $soapClient->VerifyTransaction($request->input('RefNum'), $this->merchantID());

        $order =  $this->findOrder($request->input('ResNum'));

        return $response == ($order->totalCost())
            ? [
                'status' => self::TRANSACTION_SUCCESS,
                'order' => $order,
                'refNum' => $request->input('RefNum'),
                'gateway' => $this->getGatewayName()
            ]
            : [
                'status' => self::TRANSACTION_FAILED
            ];
    }
}
