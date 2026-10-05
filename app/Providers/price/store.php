<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class store extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'effective_date' => ['required', 'date'],
        ]);

        Price::create($data);

        return redirect()->route('prices.index');
    }
}
