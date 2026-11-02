<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Slaat een nieuw product op.
class store extends Controller implements \App\Contracts\Store
{
    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Product::create($data);

        return redirect()->route('products.index');
    }
}
