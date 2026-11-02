<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Eén spel, met category, prijs en reviews.
class productShow extends Controller
{
    public function show(Product $product)
    {
        // prices gesorteerd: de nieuwste prijs staat vooraan. reviews.user voorkomt extra queries.
        $product->load([
            'category',
            'prices' => fn ($query) => $query->orderByDesc('effective_date'),
            'reviews.user',
        ]);

        return view('shop.products.show', compact('product'));
    }
}
