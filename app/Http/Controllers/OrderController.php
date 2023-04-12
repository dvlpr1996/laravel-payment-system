<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Service\Transaction\Transaction;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct(
        private Transaction $transaction
    ) {
    }

    public function index(User $user)
    {
        if (!Gate::allows('view', $user)) {
            abort(403);
        }

        return view('app.orders', compact('user'));
    }

    public function download(Order $order)
    {
        return $order->downloadInvoice();
    }

    public function unfinished(Order $order)
    {
        $this->transaction->unfinished($order);
    }
}
