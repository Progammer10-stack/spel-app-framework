<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class edit extends Controller
{
    public function edit(Order $order)
    {
        $users = User::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('orders.edit', compact('order', 'users'));
    }
}
