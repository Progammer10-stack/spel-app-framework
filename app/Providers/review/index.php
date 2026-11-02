<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

// Toont de lijst met reviews.
class index extends Controller implements \App\Contracts\Index
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])->latest()->get();

        return view('reviews.index', compact('reviews'));
    }
}
