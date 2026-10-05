<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

// Toont het formulier om een bestaand product te wijzigen.
class edit extends Controller
{
    // Product $product komt uit het id in de URL, bijvoorbeeld /products/3/edit.
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        // Zowel het product als de categories gaan naar de view.
        return view('products.edit', compact('product', 'categories'));
    }
}
