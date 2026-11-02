<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

// Verwijdert één product.
class delete extends Controller implements \App\Contracts\Delete
{
    public function delete($product)
    {
        $product = Product::query()->findOrFail($product);
        $product->delete();

        return redirect()->route('products.index');
    }
}
