<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Toont het formulier om één category te wijzigen.
class edit extends Controller implements \App\Contracts\Edit
{
    public function edit($category)
    {
        $category = Category::query()->findOrFail($category);

        return view('categories.edit', compact('category'));
    }
}
