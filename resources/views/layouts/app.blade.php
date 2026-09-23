<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Spel App')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,560;9..144,650&family=Outfit:wght@400;500;650&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="{{ url('/') }}">
            <span class="brand-mark">S</span>
            Spel App
        </a>

        <nav class="nav">
            <a href="{{ route('categories.index') }}" @class(['active' => request()->routeIs('categories.*')])>Categories</a>
            <a href="{{ route('products.index') }}" @class(['active' => request()->routeIs('products.*')])>Products</a>
            <a href="{{ route('prices.index') }}" @class(['active' => request()->routeIs('prices.*')])>Prices</a>
            <a href="{{ route('orders.index') }}" @class(['active' => request()->routeIs('orders.*')])>Orders</a>
            <a href="{{ route('order-rows.index') }}" @class(['active' => request()->routeIs('order-rows.*')])>Order rows</a>
            <a href="{{ route('reviews.index') }}" @class(['active' => request()->routeIs('reviews.*')])>Reviews</a>
            <a href="{{ route('users.index') }}" @class(['active' => request()->routeIs('users.*')])>Users</a>
            
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
