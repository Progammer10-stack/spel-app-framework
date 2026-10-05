<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // De naam 'admin' in de routes wijst naar onze eigen middleware-class.
        $middleware->alias([
            'admin' => EnsureUserIsAdmin::class,
        ]);

        // Niet ingelogd? Stuur naar de loginpagina.
        $middleware->redirectGuestsTo(fn () => route('login'));

        // Al ingelogd en je opent /login? Stuur naar home.
        $middleware->redirectUsersTo(fn () => route('home'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // API-verzoeken krijgen JSON. Gewone pagina's krijgen een HTML-foutpagina.
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        // Database uit (MAMP niet gestart): foutcode 2002 of 2003.
        // Dan tonen we een eigen pagina in plaats van een technische fout.
        $exceptions->render(function (PDOException $e, Request $request) {
            $databaseIsOff = str_contains($e->getMessage(), '[2002]')
                || str_contains($e->getMessage(), '[2003]');

            if (! $databaseIsOff) {
                return null;
            }

            return response()->view('errors.database', [], 503);
        });
    })->create();
