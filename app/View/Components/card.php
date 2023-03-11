<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class card extends Component
{
    public function __construct(
        public Product $product
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
