<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class create extends Controller
{
    public function create()
    {
        $users = User::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        return view('reviews.create', compact('users', 'products'));
    }
}
