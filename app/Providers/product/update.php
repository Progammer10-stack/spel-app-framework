<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Slaat de wijziging van een bestaand product op.
class update extends Controller implements \App\Contracts\Update
{
    public function update($product)
    {
        $product = Product::query()->findOrFail($product);

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $product->update($data);

        return redirect()->route('products.index');
    }
}
