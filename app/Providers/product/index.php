<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class index extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'prices'])->orderBy('name')->get();

        return view('products.index', compact('products'));
    }
}
