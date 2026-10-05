<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Product;

class create extends Controller
{
    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('prices.create', compact('products'));
    }
}
