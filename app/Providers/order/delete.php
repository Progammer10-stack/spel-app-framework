<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

// Verwijdert één order.
class delete extends Controller implements \App\Contracts\Delete
{
    public function delete($order)
    {
        $order = Order::query()->findOrFail($order);
        $order->delete();

        return redirect()->route('orders.index');
    }
}
