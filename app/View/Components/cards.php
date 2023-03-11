<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class cards extends Component
{
    public $products;

    public function __construct()
    {
        $this->products = Product::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.cards');
    }
}
