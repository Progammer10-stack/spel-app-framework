<?php

namespace App\Providers\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class index extends Controller
{
    public function index()
    {
        $users = User::with('role')->orderBy('name')->get();

        return view('users.index', compact('users'));
    }
}
