<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

// Toont het formulier om een bestaande review te wijzigen.
class edit extends Controller implements \App\Contracts\Edit
{
    public function edit($review)
    {
        $review = Review::query()->findOrFail($review);
        $users = User::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        return view('reviews.edit', compact('review', 'users', 'products'));
    }
}
