<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

// Slaat de wijziging van een bestaande prijs op (update).
class update extends Controller
{
    public function update(Request $request, Price $price)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'effective_date' => ['required', 'date'],
        ]);

        $price->update($data);

        return redirect()->route('prices.index');
    }
}
