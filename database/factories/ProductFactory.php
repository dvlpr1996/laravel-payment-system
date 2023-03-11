<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->realText(20),
            'description' => fake()->realText(30),
            'price' => fake()->numberBetween(0, 400000),
            'image' => 'https://loremflickr.com/'
                . mt_rand(0, 500) . '/' . mt_rand(0, 500) .
                '/world?random=' . fake()->randomNumber(),
            'stock' => fake()->numberBetween(0, 10)
        ];
    }
}
