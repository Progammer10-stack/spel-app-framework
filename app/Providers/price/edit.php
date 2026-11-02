<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;

// Toont het formulier om een bestaande prijs te wijzigen.
class edit extends Controller implements \App\Contracts\Edit
{
    public function edit($price)
    {
        $price = Price::query()->findOrFail($price);
        $products = Product::orderBy('name')->get();

        return view('prices.edit', compact('price', 'products'));
    }
}
