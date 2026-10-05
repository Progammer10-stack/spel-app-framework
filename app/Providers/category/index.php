<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Toont de lijst met categories (read).
class index extends Controller
{
    public function index()
    {
        // withCount('products') voegt products_count toe: hoeveel producten per category.
        // orderBy('name') sorteert op naam. get() haalt alle rijen op.
        $categories = Category::withCount('products')->orderBy('name')->get();

        // Geeft $categories door aan de Blade-pagina categories/index.
        return view('categories.index', compact('categories'));
    }
}
