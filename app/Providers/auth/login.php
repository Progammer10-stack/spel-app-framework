<?php

namespace App\Providers\auth;

use App\Http\Controllers\Controller;

// Toont het inlogformulier. Het controleren van het wachtwoord zit in authenticate.php.
class login extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
}
