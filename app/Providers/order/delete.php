<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

// Verwijdert één order (delete).
class delete extends Controller
{
    public function delete(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
