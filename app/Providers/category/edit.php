<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class edit extends Controller
{
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
}
