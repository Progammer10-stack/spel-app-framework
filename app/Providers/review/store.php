<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;

// Slaat een nieuwe review op.
class store extends Controller implements \App\Contracts\Store
{
    public function store()
    {
        $data = request()->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_id' => ['required', 'exists:users,id'],
            'comment' => ['required', 'string'],
        ]);

        Review::create($data);

        return redirect()->route('reviews.index');
    }
}
