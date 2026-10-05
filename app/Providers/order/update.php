<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

// Slaat de wijziging van een bestaande order op (update).
class update extends Controller
{
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'ordered_at' => ['required', 'date'],
            'status' => ['required', 'integer', 'in:0,1,2'],
        ]);

        $order->update($data);

        return redirect()->route('orders.index');
    }
}
