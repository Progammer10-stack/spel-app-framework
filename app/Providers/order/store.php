<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

// Slaat een nieuwe order op (create).
class store extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'], // verplichte, bestaande klant
            'ordered_at' => ['required', 'date'],
            'status' => ['required', 'integer', 'in:0,1,2'], // alleen 0, 1 of 2
        ]);

        Order::create($data);

        return redirect()->route('orders.index');
    }
}
