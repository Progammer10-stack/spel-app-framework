<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Alle spellen die een gewone gebruiker mag bekijken. Alleen lezen, niet bewerken.
class productIndex extends Controller
{
    public function index()
    {
        // prices gesorteerd: de nieuwste prijs (laatste effective_date) staat vooraan.
        $products = Product::with([
            'category',
            'prices' => fn ($query) => $query->orderByDesc('effective_date'),
        ])->orderBy('name')->get();

        return view('shop.products.index', compact('products'));
    }
}
