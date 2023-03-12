<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'slug' => Str::slug(fake()->realText(20)),
            'image' => 'https://loremflickr.com/332/104'
                . '/world?random=' . fake()->randomNumber(),
            'stock' => fake()->numberBetween(0, 10)
        ];
    }
}
