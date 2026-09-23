<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class edit extends Controller
{
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }
}
