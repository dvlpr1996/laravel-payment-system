<?php

namespace App\Service\Order;

use App\Service\Basket\Basket;
use App\Models\Order as ModelsOrder;
use App\Exceptions\AmountIsZeroException;

class Order
{
    public function __construct(
        private Basket $basket
    ) {
    }

    public function createOrder()
    {
        if ($this->basket->getBasketSubtotal() <= 0) {
            throw new AmountIsZeroException();
        }

        $order = ModelsOrder::create([
            'user_id' => auth()->user()->id,
            'code' => secureOrderCode(),
            'amount' => $this->basket->payableAmount(),
        ]);

        foreach ($this->basket->basketItems() as $index => $item) {
            $items[$index] = ['quantity' => $item['quantity']];
        };

        $order->products()->attach($items);

        return $order;
    }
}
