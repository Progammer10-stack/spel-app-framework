<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

// Slaat de wijziging van een bestaande orderregel op.
class update extends Controller implements \App\Contracts\Update
{
    public function update($orderRow)
    {
        $orderRow = OrderRow::query()->findOrFail($orderRow);

        $data = request()->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $orderRow->update($data);

        return redirect()->route('order-rows.index');
    }
}
