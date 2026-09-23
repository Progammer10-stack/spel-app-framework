<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

class index extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])->latest()->get();

        return view('reviews.index', compact('reviews'));
    }
}
