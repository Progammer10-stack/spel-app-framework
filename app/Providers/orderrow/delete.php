<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

class delete extends Controller
{
    public function delete(OrderRow $orderRow)
    {
        $orderRow->delete();

        return redirect()->route('order-rows.index');
    }
}
