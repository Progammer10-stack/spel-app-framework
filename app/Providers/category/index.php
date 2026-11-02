<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Toont de lijst met categories.
class index extends Controller implements \App\Contracts\Index
{
    public function index()
    {
        // withCount('products') voegt products_count toe: hoeveel producten per category.
        $categories = Category::withCount('products')->orderBy('name')->get();

        return view('categories.index', compact('categories'));
    }
}
