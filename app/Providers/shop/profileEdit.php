<?php

namespace App\Providers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Toont het eigen account. Een user kan geen andere users zien.
class profileEdit extends Controller
{
    public function edit(Request $request)
    {
        return view('shop.profile', [
            'user' => $request->user(),
        ]);
    }
}
