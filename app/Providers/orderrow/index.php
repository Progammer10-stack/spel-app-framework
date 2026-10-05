<?php

namespace App\Providers\orderrow;

use App\Http\Controllers\Controller;
use App\Models\OrderRow;

// Toont de lijst met orderregels (read).
class index extends Controller
{
    public function index()
    {
        // order.user = eerst de order, en via die order de klant.
        // product = het spel op deze regel.
        $orderRows = OrderRow::with(['order.user', 'product'])->get();

        return view('orderrows.index', compact('orderRows'));
    }
}
