<?php

namespace App\Providers\auth;

use App\Http\Controllers\Controller;

class login extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
}
