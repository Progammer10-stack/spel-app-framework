<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

// Toont het formulier om een bestaande order te wijzigen.
class edit extends Controller implements \App\Contracts\Edit
{
    public function edit($order)
    {
        $order = Order::query()->findOrFail($order);
        $users = User::orderBy('name')->get();

        return view('orders.edit', compact('order', 'users'));
    }
}
