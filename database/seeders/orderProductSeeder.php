<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class orderProductSeeder extends Seeder
{
    public function run(): void
    {
        OrderProduct::factory()->count(5)->create();
    }
}
