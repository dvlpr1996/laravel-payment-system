<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct()
    {

    }
    
    public function add(Product $product)
    {
        dd($product);
    }
}
