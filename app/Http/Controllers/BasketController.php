<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Service\Basket\Basket;
use App\Http\Requests\UpdateBasketRequest;
use App\Exceptions\QuantityExceededException;

class BasketController extends Controller
{
    public function __construct(
        private Basket $basket
    ) {
    }

    public function index()
    {
        $baskets = $this->basket->getBasketItemInfo();
        return view('app.basket', compact('baskets'));
    }

    public function add(Product $product)
    {
        try {
            $this->basket->addToBasket($product, 1);
            return back()->with('success', __('payment.success add to basket'));
        } catch (QuantityExceededException $e) {
            return back()->with('error', __('payment.quantity exceeded'));
        }
    }

    public function remove(Product $product)
    {
        $this->basket->unsetItem($product);
        return back()->with('success', __('payment.success remove from basket'));
    }

    public function update(UpdateBasketRequest $request, Product $product)
    {
        $quantity = (int)$request->quantity;

        if ($quantity === 0) {
            return $this->remove($product);
        }

        try {
            $this->basket->updateBasket($product, $quantity);
            return back()->with('success', __('payment.success add to basket'));
        } catch (QuantityExceededException $e) {
            return back()->with('error', __('payment.quantity exceeded'));
        }
    }
}
