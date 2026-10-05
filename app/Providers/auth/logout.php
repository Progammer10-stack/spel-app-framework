<?php

namespace App\Providers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Logt de huidige user uit.
class logout extends Controller
{
    public function logout(Request $request)
    {
        // Haal de user uit de sessie.
        Auth::logout();

        // Maak de sessie ongeldig en geef een nieuw CSRF-token.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
