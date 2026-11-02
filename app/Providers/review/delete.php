<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

// Verwijdert één review.
class delete extends Controller implements \App\Contracts\Delete
{
    public function delete($review)
    {
        $review = Review::query()->findOrFail($review);
        $review->delete();

        return redirect()->route('reviews.index');
    }
}
