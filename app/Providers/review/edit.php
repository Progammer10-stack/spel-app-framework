<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class edit extends Controller
{
    public function edit(Review $review)
    {
        $users = User::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        return view('reviews.edit', compact('review', 'users', 'products'));
    }
}
