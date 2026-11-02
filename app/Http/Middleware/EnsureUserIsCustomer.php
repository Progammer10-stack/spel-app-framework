<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Deze check draait vóór de pagina's voor gewone gebruikers.
class EnsureUserIsCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Een admin hoort in het beheer, niet in de winkel.
        if ($user?->isAdmin()) {
            return redirect()->route('home');
        }

        // Alleen de rol User mag deze pagina's openen.
        if ($user === null || ! $user->isUser()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
