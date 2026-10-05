<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

// Verwijdert één orderregel (delete). De order zelf blijft staan.
class delete extends Controller
{
    public function delete(OrderRow $orderRow)
    {
        $orderRow->delete();

        return redirect()->route('order-rows.index');
    }
}
