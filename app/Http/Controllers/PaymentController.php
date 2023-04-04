<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
    }

    public function verify(Request $request)
    {
        dd($request->all());
    }
}
