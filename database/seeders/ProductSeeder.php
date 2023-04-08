<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            'Action collection',
            'Comedy collection',
            'Fantasy collection',
            'Drama collection',
            'Mystery collection',
            'Romance collection',
            'Horror collection',
            'Sci-Fi collection',
        ];

        foreach ($titles as $title) {
            Product::create([
                'title' => $title,
                'description' => 'type of label a piece of printed paper',
                'price' => fake()->numberBetween(10000, 50000),
                'slug' => Str::slug($title),
                'stock' => fake()->numberBetween(0, 10),
                'image' => 'https://loremflickr.com/5000/3334/world?random='.fake()->randomNumber(),
            ]);
        }
    }
}
