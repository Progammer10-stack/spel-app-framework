<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

// Verwijdert één orderregel. De order zelf blijft staan.
class delete extends Controller implements \App\Contracts\Delete
{
    public function delete($orderRow)
    {
        $orderRow = OrderRow::query()->findOrFail($orderRow);
        $orderRow->delete();

        return redirect()->route('order-rows.index');
    }
}
