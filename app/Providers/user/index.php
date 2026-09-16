<?php

namespace App\Providers\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class index extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
}
