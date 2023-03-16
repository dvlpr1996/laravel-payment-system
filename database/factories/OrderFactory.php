<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::first() ?? User::factory(),
            'code' => fake()->randomNumber(5, true),
            'amount' => fake()->numberBetween(0, 100),
        ];
    }
}
