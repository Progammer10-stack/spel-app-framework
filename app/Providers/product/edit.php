<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

// Toont het formulier om een bestaand product te wijzigen.
class edit extends Controller implements \App\Contracts\Edit
{
    public function edit($product)
    {
        $product = Product::query()->findOrFail($product);
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }
}
