<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketCheckOutRequest;

class CheckOutController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('app.checkout');
    }

    public function checkOut(BasketCheckOutRequest $request)
    {
        dd($request->all());
    }
}
