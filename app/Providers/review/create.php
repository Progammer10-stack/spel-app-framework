<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

// Toont het formulier om een review toe te voegen.
class create extends Controller
{
    public function create()
    {
        // Twee dropdowns: alle klanten en alle producten.
        $users = User::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        return view('reviews.create', compact('users', 'products'));
    }
}
