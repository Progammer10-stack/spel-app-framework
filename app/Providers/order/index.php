<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class index extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderRows'])->latest('ordered_at')->get();

        return view('orders.index', compact('orders'));
    }
}
