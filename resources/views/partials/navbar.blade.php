{{-- Dit partial bevat alle links van de navigatiebalk. --}}
@auth
    <nav class="nav">
        @if (auth()->user()->isAdmin())
            {{-- Beheerlinks. active geeft de link van de huidige pagina een andere opmaak. --}}
            <a href="{{ route('categories.index') }}" @class(['active' => request()->routeIs('categories.*')])>Categories</a>
            <a href="{{ route('products.index') }}" @class(['active' => request()->routeIs('products.*')])>Products</a>
            <a href="{{ route('prices.index') }}" @class(['active' => request()->routeIs('prices.*')])>Prices</a>
            <a href="{{ route('orders.index') }}" @class(['active' => request()->routeIs('orders.*')])>Orders</a>
            <a href="{{ route('order-rows.index') }}" @class(['active' => request()->routeIs('order-rows.*')])>Order rows</a>
            <a href="{{ route('reviews.index') }}" @class(['active' => request()->routeIs('reviews.*')])>Reviews</a>
            <a href="{{ route('users.index') }}" @class(['active' => request()->routeIs('users.*')])>Users</a>
        @else
            {{-- Links voor een gewone gebruiker. --}}
            <a href="{{ route('shop.home') }}" @class(['active' => request()->routeIs('shop.home')])>Home</a>
            <a href="{{ route('shop.products.index') }}" @class(['active' => request()->routeIs('shop.products.*')])>Spellen</a>
            <a href="{{ route('shop.orders.index') }}" @class(['active' => request()->routeIs('shop.orders.*')])>Bestellingen</a>
            <a href="{{ route('shop.reviews.index') }}" @class(['active' => request()->routeIs('shop.reviews.*')])>Reviews</a>
            <a href="{{ route('shop.profile.edit') }}" @class(['active' => request()->routeIs('shop.profile.*')])>Account</a>
        @endif
    </nav>
@endauth
