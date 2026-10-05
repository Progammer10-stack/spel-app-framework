<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Toont de lijst met producten (read).
class index extends Controller
{
    public function index()
    {
        // with() laadt category en prijzen meteen mee.
        // Zonder with() doet de view voor elk product een extra databasevraag.
        $products = Product::with(['category', 'prices'])->orderBy('name')->get();

        return view('products.index', compact('products'));
    }
}
