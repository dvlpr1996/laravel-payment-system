<?php

namespace App\Service\Basket;

use App\Models\Product;
use Illuminate\Support\Facades\Config;
use App\Service\Basket\Trait\BasketTrait;
use App\Service\Storage\Contract\StorageInterface;

class Basket
{
    use BasketTrait;

    private StorageInterface $storage;
    public int $transportationCosts;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
        $this->transportationCosts = Config::get('payment.transportationCosts');
    }

    public function getTransportationCosts()
    {
        return moneyFormat($this->transportationCosts);
    }

    public function addToBasket(Product $product, int $quantity)
    {
        if ($this->checkItemsExists($product)) {
            $quantity = $this->countQuantity($product) + $quantity;
        }

        $this->updateQuantity($product, $quantity);
    }

    public function updateBasket(Product $product, int $quantity)
    {
        $this->updateQuantity($product, $quantity);
    }
}
