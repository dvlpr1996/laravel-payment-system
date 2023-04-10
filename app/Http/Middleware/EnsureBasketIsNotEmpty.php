<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureBasketIsNotEmpty
{
    public function handle(Request $request, Closure $next): Response
    {
        if (empty($request->session()->get(config('payment.bucket name')))) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
