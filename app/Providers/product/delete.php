<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class delete extends Controller
{
    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
