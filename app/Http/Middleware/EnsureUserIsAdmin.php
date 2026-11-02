<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// Deze check draait vóór elke afgeschermde pagina.
class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Een gewone gebruiker blijft ingelogd, maar gaat naar de winkel.
        if ($user?->isUser()) {
            return redirect()->route('shop.home');
        }

        // Geen gebruiker, of een rol die hier niet hoort: sessie weg en terug naar login.
        if ($user === null || ! $user->isAdmin()) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Alleen admins mogen inloggen.',
                ]);
        }

        // Wel admin: ga door naar de pagina.
        return $next($request);
    }
}
