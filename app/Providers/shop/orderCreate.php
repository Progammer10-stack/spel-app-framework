<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Formulier om één spel te bestellen.
class orderCreate extends Controller
{
    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('shop.orders.create', compact('products'));
    }
}
