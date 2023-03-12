<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('app.home');
    }

    public function product(Product $product)
    {
        return view('app.product', compact('product'));
    }
}
