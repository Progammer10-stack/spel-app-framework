{{-- Dit partial bevat het bovenste deel van de header: logo, gebruikersnaam en uitloggen. --}}
<div class="header-top">
    {{-- Admin gaat naar beheer, een gewone user naar de winkel, een gast naar login. --}}
    <a class="brand" href="{{ auth()->check() ? (auth()->user()->isAdmin() ? route('home') : route('shop.home')) : route('login') }}">
        <span class="brand-mark">S</span>
        Spel App
    </a>

    {{-- @auth toont dit blok alleen als er iemand is ingelogd. --}}
    @auth
        <div class="user-menu">
            <span class="user-name">{{ auth()->user()->name }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="button" type="submit">Uitloggen</button>
            </form>
        </div>
    @endauth
</div>
