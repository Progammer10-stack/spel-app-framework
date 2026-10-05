{{-- Bestaande user. Het wachtwoord wordt hier niet gewijzigd. --}}
@extends('layouts.app')

@section('title', 'User bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>User bewerken</h1>
            <p>Pas naam, e-mail of rol aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <label>
            Naam
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </label>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            E-mail
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </label>
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Rol
            <select name="role_id" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('role_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('users.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
