<?php

namespace App\Service\Basket;

use App\Models\Product;
use App\Service\Basket\Trait\BasketTrait;
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
        if ($this->checkItemsExists($product)) {
            $quantity = $this->countQuantity($product) + $quantity;
        }

        if (!$quantity) {
            return $this->unsetItem($product);
        }

        $this->addItemsToBasket($product, [
            'quantity' => $quantity
        ]);
    }
}
