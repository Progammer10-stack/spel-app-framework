<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;
use Illuminate\Http\Request;

class update extends Controller
{
    public function update(Request $request, OrderRow $orderRow)
    {
        $data = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $orderRow->update($data);

        return redirect()->route('order-rows.index');
    }
}
