<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

class index extends Controller
{
    public function index()
    {
        $prices = Price::with('product')->orderBy('effective_date', 'desc')->get();

        return view('prices.index', compact('prices'));
    }
}
