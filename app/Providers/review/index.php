<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

// Toont de lijst met reviews (read).
class index extends Controller
{
    public function index()
    {
        // latest() sorteert op created_at, nieuwste eerst.
        $reviews = Review::with(['user', 'product'])->latest()->get();

        return view('reviews.index', compact('reviews'));
    }
}
