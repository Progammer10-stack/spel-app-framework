<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;
use Illuminate\Http\Request;

// Slaat een nieuwe orderregel op (create).
class store extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        // Koppel het gekozen product aan de gekozen order.
        OrderRow::create($data);

        return redirect()->route('order-rows.index');
    }
}
