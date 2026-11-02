<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

// Slaat de wijziging van een bestaande review op.
class update extends Controller implements \App\Contracts\Update
{
    public function update($review)
    {
        $review = Review::query()->findOrFail($review);

        $data = request()->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_id' => ['required', 'exists:users,id'],
            'comment' => ['required', 'string'],
        ]);

        $review->update($data);

        return redirect()->route('reviews.index');
    }
}
