<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Spel App')</title>
</head>
<body>
    <h1>Spel App</h1>

    <nav>
        <ul>
            <li><a href="{{ route('categories.index') }}">Categories</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li><a href="{{ route('prices.index') }}">Prices</a></li>
            <li><a href="{{ route('orders.index') }}">Orders</a></li>
            <li><a href="{{ route('order-rows.index') }}">Order rows</a></li>
            <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li><a href="{{ route('examples.index') }}">Examples</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
