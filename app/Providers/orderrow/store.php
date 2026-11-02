<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

// Slaat een nieuwe orderregel op.
class store extends Controller implements \App\Contracts\Store
{
    public function store()
    {
        $data = request()->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        OrderRow::create($data);

        return redirect()->route('order-rows.index');
    }
}
