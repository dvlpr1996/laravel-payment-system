<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        return view('app.product', compact('product'));
    }
}
