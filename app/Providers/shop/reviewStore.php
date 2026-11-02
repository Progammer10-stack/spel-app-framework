<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

// Slaat een review op voor de ingelogde gebruiker.
class reviewStore extends Controller
{
    public function store(Request $request)
    {
        // Happy: spel én tekst. Unhappy: een van de twee ontbreekt.
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'comment' => ['required', 'string'],
        ], [
            'product_id.required' => 'De review is niet opgeslagen. Kies een spel.',
            'product_id.exists' => 'De review is niet opgeslagen. Dit spel bestaat niet.',
            'comment.required' => 'De review is niet opgeslagen. Schrijf een tekst.',
        ]);

        Review::create([
            'user_id' => $request->user()->id,
            'product_id' => $data['product_id'],
            'comment' => $data['comment'],
        ]);

        return redirect()
            ->route('shop.reviews.index')
            ->with('success', 'Je review is opgeslagen.');
    }
}
