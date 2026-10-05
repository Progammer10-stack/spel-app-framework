<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Toont het formulier om een product toe te voegen.
class create extends Controller
{
    public function create()
    {
        // De dropdown heeft alle categories nodig, alfabetisch.
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }
}
