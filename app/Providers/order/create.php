<?php

namespace App\Providers\order;

use App\Http\Controllers\Controller;
use App\Models\User;

// Toont het formulier om een order toe te voegen.
class create extends Controller
{
    public function create()
    {
        // Alle klanten, alfabetisch, voor de dropdown.
        $users = User::orderBy('name')->get();

        return view('orders.create', compact('users'));
    }
}
