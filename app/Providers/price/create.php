<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Toont het formulier om een prijs toe te voegen.
class create extends Controller
{
    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('prices.create', compact('products'));
    }
}
