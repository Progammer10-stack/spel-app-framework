<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;

class edit extends Controller
{
    public function edit(Price $price)
    {
        $products = Product::orderBy('name')->get();

        return view('prices.edit', compact('price', 'products'));
    }
}
