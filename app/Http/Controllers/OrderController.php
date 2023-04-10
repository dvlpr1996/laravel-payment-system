<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(User $user)
    {
        return view('app.orders', compact('user'));
    }
}
