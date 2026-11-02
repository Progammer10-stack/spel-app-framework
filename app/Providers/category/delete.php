<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Verwijdert één category.
class delete extends Controller implements \App\Contracts\Delete
{
    public function delete($category)
    {
        $category = Category::query()->findOrFail($category);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
