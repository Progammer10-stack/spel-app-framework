<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class update extends Controller
{
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'ordered_at' => ['required', 'date'],
            'status' => ['required', 'integer', 'in:0,1,2'],
        ], [
            'user_id.required' => 'Kies een klant uit de suggesties.',
            'user_id.exists' => 'Deze klant bestaat niet.',
        ]);

        $order->update($data);

        return redirect()->route('orders.index');
    }
}
