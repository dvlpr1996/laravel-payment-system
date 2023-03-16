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

    private function checkItemsExists(Product $product)
    {
        return $this->storage->exists($product->slug);
    }

    private function addItemsToBasket(Product $product, array $data)
    {
        return $this->storage->set($product->slug, $data);
    }

    private function unsetItem(Product $product)
    {
        return $this->storage->unset($product->slug);
    }

    private function countQuantity(Product $product)
    {
        return $this->storage->get($product->slug)['quantity'];
    }
}
