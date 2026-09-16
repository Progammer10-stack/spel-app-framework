<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class index extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
}
