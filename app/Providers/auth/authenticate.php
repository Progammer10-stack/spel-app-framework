<?php

namespace App\Providers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Verwerkt het inlogformulier.
class authenticate extends Controller
{
    public function authenticate(Request $request)
    {
        // E-mail moet een geldig e-mailadres zijn. Wachtwoord mag niet leeg zijn.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Auth::attempt zoekt de user en vergelijkt het wachtwoord.
        // boolean('remember') is true als het vinkje "Onthoud mij" aan staat.
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // Terug naar het formulier, met een fout bij het e-mailveld.
            // onlyInput('email') bewaart de e-mail, niet het wachtwoord.
            return back()->withErrors([
                'email' => 'Deze inloggegevens kloppen niet.',
            ])->onlyInput('email');
        }

        // De rol staat in een andere tabel. load() haalt die relatie op.
        $request->user()->load('role');

        // Nieuwe sessie-id na een geslaagde login.
        $request->session()->regenerate();

        // Admin gaat naar het beheer. Een gewone user gaat naar de winkel.
        if ($request->user()->isAdmin()) {
            return redirect()->intended(route('home'));
        }

        if ($request->user()->isUser()) {
            return redirect()->intended(route('shop.home'));
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->withErrors([
            'email' => 'Dit account heeft geen geldige rol.',
        ])->onlyInput('email');
    }
}
