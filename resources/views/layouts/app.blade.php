<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Elke pagina vult zijn eigen titel in via @section('title'). --}}
    <title>@yield('title', 'Spel App')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,560;9..144,650&family=Outfit:wght@400;500;650&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        {{-- @include plaatst de inhoud van een partial op deze plek. --}}
        @include('partials.header')
        @include('partials.navbar')
    </header>

    <main>
        {{-- Groen of rood, vóór de inhoud van de pagina. --}}
        @include('partials.notices')

        {{-- Hier komt de inhoud van de specifieke pagina. --}}
        @yield('content')
    </main>
</body>
</html>
