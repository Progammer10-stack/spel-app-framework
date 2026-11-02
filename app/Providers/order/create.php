<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\User;

// Toont het formulier om een order toe te voegen.
class create extends Controller implements \App\Contracts\Create
{
    public function create()
    {
        $users = User::orderBy('name')->get();

        return view('orders.create', compact('users'));
    }
}
