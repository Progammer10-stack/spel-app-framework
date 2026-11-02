<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Alleen de bestellingen van de ingelogde gebruiker.
class orderIndex extends Controller
{
    public function index(Request $request)
    {
        $orders = $request->user()
            ->orders()
            ->with(['orderRows.product'])
            ->latest('ordered_at')
            ->get();

        return view('shop.orders.index', compact('orders'));
    }
}
