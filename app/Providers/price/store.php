<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

// Slaat een nieuwe prijs op.
class store extends Controller implements \App\Contracts\Store
{
    public function store()
    {
        $data = request()->validate([
            'product_id' => ['required', 'exists:products,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'effective_date' => ['required', 'date'],
        ]);

        Price::create($data);

        return redirect()->route('prices.index');
    }
}
