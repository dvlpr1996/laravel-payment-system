<?php

namespace App\Service\Basket\Trait;

use App\Models\Product;
use App\Exceptions\QuantityExceededException;

trait BasketTrait
{
    public function clearBasket()
    {
        return $this->storage->clearAll();
    }

    public function basketItems()
    {
        return $this->storage->all();
    }

    public function basketCount()
    {
        return $this->storage->count();
    }

    private function checkItemsExists(Product $product)
    {
        return $this->storage->exists($product->id);
    }

    private function addItemsToBasket(Product $product, array $data)
    {
        return $this->storage->set($product->id, $data);
    }

    public function updateQuantity(Product $product, int $quantity)
    {
        $this->checkBasketDate($product, $quantity);
        $this->addItemsToBasket($product, [
            'quantity' => $quantity
        ]);
    }

    public function unsetItem(Product $product)
    {
        return $this->storage->unset($product->id);
    }

    private function countQuantity(Product $product)
    {
        return $this->storage->get($product->id)['quantity'];
    }

    public function getBasketItemInfo()
    {
        $basketItemInfo = Product::find(array_keys($this->basketItems()))->all();
        foreach ($basketItemInfo as $item) {
            $item->quantity = $this->countQuantity($item);
        }
        return $basketItemInfo;
    }

    public function getBasketSubtotal()
    {
        $subtotal = 0;
        foreach ($this->getBasketItemInfo() as $item) {
            $subtotal += $item->price * $item->quantity;
        }
        return $subtotal;
    }

    public function checkBasketDate(Product $product, int $quantity)
    {
        if ($product->stock == 0) {
            throw new QuantityExceededException(__('payment.quantity exceeded'));
        }

        if ($product->checkStock($quantity)) {
            throw new QuantityExceededException(__('payment.quantity exceeded'));
        }

        if (!$quantity) {
            return $this->unsetItem($product);
        }
    }
}
