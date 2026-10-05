<?php

namespace App\Providers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

// Slaat een nieuw product op (create).
class store extends Controller
{
    public function store(Request $request)
    {
        // validate() stopt het opslaan als een veld niet klopt.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'], // mag leeg zijn
            'category_id' => ['required', 'exists:categories,id'], // moet een bestaande category zijn
        ]);

        Product::create($data);

        return redirect()->route('products.index');
    }
}
