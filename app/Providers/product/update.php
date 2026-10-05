<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

// Slaat de wijziging van een bestaand product op (update).
class update extends Controller
{
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // Zelfde velden als bij aanmaken, maar nu op het bestaande product.
        $product->update($data);

        return redirect()->route('products.index');
    }
}
