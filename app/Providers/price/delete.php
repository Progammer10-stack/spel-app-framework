<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

// Verwijdert één prijs. Het product blijft staan.
class delete extends Controller implements \App\Contracts\Delete
{
    public function delete($price)
    {
        $price = Price::query()->findOrFail($price);
        $price->delete();

        return redirect()->route('prices.index');
    }
}
