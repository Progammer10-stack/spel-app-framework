<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

// Toont de lijst met bestellingen (read).
class index extends Controller
{
    public function index()
    {
        // with() haalt de klant en de orderregels mee.
        // latest('ordered_at') zet de nieuwste bestelling bovenaan.
        $orders = Order::with(['user', 'orderRows'])->latest('ordered_at')->get();

        return view('orders.index', compact('orders'));
    }
}
