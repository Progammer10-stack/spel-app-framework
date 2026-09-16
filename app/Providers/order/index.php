<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class index extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }
}
