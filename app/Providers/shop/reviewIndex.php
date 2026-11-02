<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Alleen de reviews van de ingelogde gebruiker.
class reviewIndex extends Controller
{
    public function index(Request $request)
    {
        $reviews = $request->user()
            ->reviews()
            ->with('product')
            ->latest()
            ->get();

        return view('shop.reviews.index', compact('reviews'));
    }
}
