<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

// Verwijdert één prijs (delete). Het product blijft staan.
class delete extends Controller
{
    public function delete(Price $price)
    {
        $price->delete();

        return redirect()->route('prices.index');
    }
}
