@extends('layouts.app')

@section('title', 'Inloggen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Inloggen</h1>
            <p>Log in als admin voor het beheer, of als gebruiker voor de winkel.</p>
        </div>
    </div>

    {{-- Dit formulier gaat naar de authenticate-methode. --}}
    <form class="panel form" method="POST" action="{{ route('login.store') }}">
        @csrf

        <label>
            E-mail
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </label>

        <label>
            Wachtwoord
            <input type="password" name="password" required>
        </label>

        <label class="checkbox">
            {{-- @checked zet het vinkje aan als de vorige poging het ook aan had. --}}
            <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
            Onthoud mij
        </label>

        <div class="form-actions">
            <button type="submit">Inloggen</button>
        </div>
    </form>
@endsection
