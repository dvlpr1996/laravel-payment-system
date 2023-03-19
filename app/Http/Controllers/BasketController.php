<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Service\Basket\Basket;
use Exception;

class BasketController extends Controller
{
    public function __construct(
        private Basket $basket
    ) {
    }

    public function add(Product $product)
    {
        try {
            $this->basket->addToBasket($product, 1);
            return back()->with('success', __('payment.success add to basket'));
        } catch (Exception $e) {
            return back()->with('error', __('payment.quantity exceeded'));
        }
    }
}
