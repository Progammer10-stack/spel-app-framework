<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class create extends Controller
{
    public function create()
    {
        $orders = Order::with('user')->orderByDesc('ordered_at')->get();
        $products = Product::orderBy('name')->get();

        return view('orderrows.create', compact('orders', 'products'));
    }
}
