<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

// Toont het formulier om een orderregel toe te voegen.
class create extends Controller
{
    public function create()
    {
        // with('user') haalt de klantnaam mee, die komt in de dropdown te staan.
        $orders = Order::with('user')->orderByDesc('ordered_at')->get();
        $products = Product::orderBy('name')->get();

        return view('orderrows.create', compact('orders', 'products'));
    }
}
