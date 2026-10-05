<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Laravel start dit bestand bij het opstarten van de app.
// Hier staan geen extra services. De pagina's zitten in de andere bestanden in Providers.
class AppServiceProvider extends ServiceProvider
{
    // Hier kun je classes in de container registreren. Dat doen we niet.
    public function register(): void
    {
        //
    }

    // Hier kun je iets doen nadat de app is opgestart. Dat doen we niet.
    public function boot(): void
    {
        //
    }
}
