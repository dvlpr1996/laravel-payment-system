<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::first() ?? Order::factory(),
            'method' => fake()->text('20'),
            'gateway' => $this->fakePaymentMethod(),
            'ref_num' => fake()->randomNumber(5, true),
            'amount' => fake()->numberBetween(0, 400000),
            'status' => $this->fakeStatus()

        ];
    }

    private function fakePaymentMethod()
    {
        $paymentMethod = ['online', 'cash', 'cards'];
        shuffle($paymentMethod);
        return array_rand($paymentMethod);
    }

    private function fakeStatus()
    {
        $status = [0, 1];
        shuffle($status);
        return array_rand($status);
    }
}
