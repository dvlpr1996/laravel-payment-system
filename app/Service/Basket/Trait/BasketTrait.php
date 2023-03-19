<?php

namespace App\Service\Basket\Trait;

use App\Models\Product;

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
}
