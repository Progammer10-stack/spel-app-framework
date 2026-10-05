<?php

namespace App\Providers\user;

use App\Http\Controllers\Controller;
use App\Models\User;

// Toont de lijst met users (read).
class index extends Controller
{
    public function index()
    {
        // with('role') haalt de rol mee, zodat de view de rolnaam kan tonen.
        $users = User::with('role')->orderBy('name')->get();

        return view('users.index', compact('users'));
    }
}
