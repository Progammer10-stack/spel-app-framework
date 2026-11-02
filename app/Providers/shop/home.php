<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

// Startpagina van de winkel voor een gewone gebruiker.
class home extends Controller
{
    public function home(Request $request)
    {
        $user = $request->user();

        // De eerste spellen op de homepagina. De volledige lijst staat op /shop/products.
        $products = Product::with('category')->orderBy('name')->limit(4)->get();

        return view('shop.home', [
            'products' => $products,
            'productCount' => Product::count(),
            'orderCount' => $user->orders()->count(),
            'reviewCount' => $user->reviews()->count(),
        ]);
    }
}
