<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;

// Slaat een nieuwe order op.
class store extends Controller implements \App\Contracts\Store
{
    public function store()
    {
        $data = request()->validate([
            'user_id' => ['required', 'exists:users,id'],
            'ordered_at' => ['required', 'date'],
            'status' => ['required', 'integer', 'in:0,1,2'],
        ]);

        Order::create($data);

        return redirect()->route('orders.index');
    }
}
