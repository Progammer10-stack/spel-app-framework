<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class delete extends Controller
{
    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
