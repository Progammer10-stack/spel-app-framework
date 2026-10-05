<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

// Slaat de wijziging van een bestaande review op (update).
class update extends Controller
{
    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_id' => ['required', 'exists:users,id'],
            'comment' => ['required', 'string'],
        ]);

        $review->update($data);

        return redirect()->route('reviews.index');
    }
}
