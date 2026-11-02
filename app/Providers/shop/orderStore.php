<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderRow;
use Illuminate\Http\Request;

// Slaat een bestelling op voor de ingelogde gebruiker.
class orderStore extends Controller
{
    public function store(Request $request)
    {
        // Happy: een bestaand spel. Unhappy: leeg of een spel dat niet bestaat.
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ], [
            'product_id.required' => 'De bestelling is niet geplaatst. Kies een spel.',
            'product_id.exists' => 'De bestelling is niet geplaatst. Dit spel bestaat niet.',
        ]);

        // De klant is altijd de ingelogde user. Die kan geen ander account kiezen.
        $order = Order::create([
            'user_id' => $request->user()->id,
            'ordered_at' => now(),
            'status' => 0,
        ]);

        // Eén orderregel: het gekozen spel hoort bij deze bestelling.
        OrderRow::create([
            'order_id' => $order->id,
            'product_id' => $data['product_id'],
        ]);

        // with('success') bewaart de groene zin tot de volgende pagina.
        return redirect()
            ->route('shop.orders.index')
            ->with('success', 'Je bestelling is geplaatst.');
    }
}
