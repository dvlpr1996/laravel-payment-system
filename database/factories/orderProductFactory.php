<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class orderProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'order_id' => Order::first() ?? Order::factory(),
            'product_id' => Product::first() ?? Product::factory()
        ];
    }
}
