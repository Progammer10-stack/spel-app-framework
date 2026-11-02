<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Slaat een nieuwe category op.
class store extends Controller implements \App\Contracts\Store
{
    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Category::create($data);

        return redirect()->route('categories.index');
    }
}
