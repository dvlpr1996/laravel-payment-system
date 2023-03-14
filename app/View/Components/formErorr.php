<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formErorr extends Component
{
    public function __construct(
        public $errors
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.formErorr');
    }
}
