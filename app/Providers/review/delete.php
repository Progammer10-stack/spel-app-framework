<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

class delete extends Controller
{
    public function delete(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index');
    }
}
