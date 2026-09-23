<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderRow;
use App\Models\Product;

class edit extends Controller
{
    public function edit(OrderRow $orderRow)
    {
        $orders = Order::with('user')->orderByDesc('ordered_at')->get();
        $products = Product::orderBy('name')->get();

        return view('orderrows.edit', compact('orderRow', 'orders', 'products'));
    }
}
