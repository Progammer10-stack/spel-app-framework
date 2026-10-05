<?php

namespace App\Providers\review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class store extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_id' => ['required', 'exists:users,id'],
            'comment' => ['required', 'string'],
        ]);

        Review::create($data);

        return redirect()->route('reviews.index');
    }
}
