<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Toont het formulier om één category te wijzigen.
class edit extends Controller
{
    // Category $category: Laravel zoekt de category zelf via het id in de URL.
    public function edit(Category $category)
    {
        // compact('category') is hetzelfde als ['category' => $category].
        return view('categories.edit', compact('category'));
    }
}
