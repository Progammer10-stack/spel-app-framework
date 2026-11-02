<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

// Toont de lijst met orderregels.
class index extends Controller implements \App\Contracts\Index
{
    public function index()
    {
        $orderRows = OrderRow::with(['order.user', 'product'])->get();

        return view('orderrows.index', compact('orderRows'));
    }
}
