<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

// Slaat de wijziging van een bestaande order op.
class update extends Controller implements \App\Contracts\Update
{
    public function update($order)
    {
        $order = Order::query()->findOrFail($order);

        $data = request()->validate([
            'user_id' => ['required', 'exists:users,id'],
            'ordered_at' => ['required', 'date'],
            'status' => ['required', 'integer', 'in:0,1,2'],
        ]);

        $order->update($data);

        return redirect()->route('orders.index');
    }
}
