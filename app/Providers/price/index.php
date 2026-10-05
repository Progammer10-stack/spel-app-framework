<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

// Toont de lijst met prijzen (read).
class index extends Controller
{
    public function index()
    {
        // Nieuwste datum bovenaan. product wordt meegeladen voor de productnaam.
        $prices = Price::with('product')->orderBy('effective_date', 'desc')->get();

        return view('prices.index', compact('prices'));
    }
}
