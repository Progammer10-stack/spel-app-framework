<?php

namespace App\Providers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

// Slaat de wijziging van een bestaande category op.
class update extends Controller implements \App\Contracts\Update
{
    public function update($category)
    {
        $category = Category::query()->findOrFail($category);

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $category->update($data);

        return redirect()->route('categories.index');
    }
}
