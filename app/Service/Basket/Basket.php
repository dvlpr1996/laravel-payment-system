<?php

namespace App\Service\Basket;

use App\Models\Product;
use App\Service\Basket\Trait\BasketTrait;
use App\Exceptions\QuantityExceededException;
use App\Service\Storage\Contract\StorageInterface;

class Basket
{
    use BasketTrait;

    public function __construct(
        private StorageInterface $storage
    ) {
    }

    public function addToBasket(Product $product, int $quantity)
    {
        if ($product->stock == 0) {
            $this->unsetItem($product);
            throw new QuantityExceededException();
        }

        if ($this->checkItemsExists($product)) {
            $quantity = $this->countQuantity($product) + $quantity;
        }

        if ($product->checkStock($quantity)) {
            $this->unsetItem($product);
            throw new QuantityExceededException();
        }

        if (!$quantity) {
            return $this->unsetItem($product);
        }

        $this->addItemsToBasket($product, [
            'quantity' => $quantity
        ]);
    }

    public function updateBasket(Product $product, int $quantity)
    {
        if ($product->checkStock($quantity)) {
            throw new QuantityExceededException();
        }

        $currentQuantity = $this->countQuantity($product);

        $this->addItemsToBasket($product, [
            'quantity' => $quantity + $currentQuantity
        ]);
    }
}
