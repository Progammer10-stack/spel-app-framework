<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

// Toont de lijst met prijzen.
class index extends Controller implements \App\Contracts\Index
{
    public function index()
    {
        $prices = Price::with('product')->orderBy('effective_date', 'desc')->get();

        return view('prices.index', compact('prices'));
    }
}
