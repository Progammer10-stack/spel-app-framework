<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;
use Illuminate\Http\Request;

class store extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        OrderRow::create($data);

        return redirect()->route('order-rows.index');
    }
}
