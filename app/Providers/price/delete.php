<?php

namespace App\Providers\price;

use App\Http\Controllers\Controller;
use App\Models\Price;

class delete extends Controller
{
    public function delete(Price $price)
    {
        $price->delete();

        return redirect()->route('prices.index');
    }
}
