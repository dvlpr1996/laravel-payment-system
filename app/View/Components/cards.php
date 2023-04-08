<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
