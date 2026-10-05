<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Category;

class create extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }
}
