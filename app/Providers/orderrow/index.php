<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

class index extends Controller
{
    public function index()
    {
        $orderRows = OrderRow::with(['order.user', 'product'])->get();

        return view('orderrows.index', compact('orderRows'));
    }
}
