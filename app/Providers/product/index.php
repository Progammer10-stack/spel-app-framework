<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Toont de lijst met producten.
class index extends Controller implements \App\Contracts\Index
{
    public function index()
    {
        // with() laadt category en prijzen meteen mee.
        $products = Product::with(['category', 'prices'])->orderBy('name')->get();

        return view('products.index', compact('products'));
    }
}
