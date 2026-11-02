<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

// Toont de lijst met bestellingen.
class index extends Controller implements \App\Contracts\Index
{
    public function index()
    {
        $orders = Order::with(['user', 'orderRows'])->latest('ordered_at')->get();

        return view('orders.index', compact('orders'));
    }
}
