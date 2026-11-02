<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Formulier om een review te schrijven.
class reviewCreate extends Controller
{
    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('shop.reviews.create', compact('products'));
    }
}
