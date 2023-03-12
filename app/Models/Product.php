<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value == 0 ? 'Not Define' : 'تومان ' . moneyFormat($value),
        );
    }
}
