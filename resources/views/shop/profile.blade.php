{{-- Eigen account. De rol kan hier niet worden veranderd. --}}
@extends('layouts.app')

@section('title', 'Mijn account')

@section('content')
    <div class="page-head">
        <div>
            <h1>Mijn account</h1>
            <p>Rol: {{ $user->role->name }}</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('shop.profile.update') }}">
        @csrf
        @method('PUT')

        <label>
            Naam
            {{-- Geen required: een leeg veld toont de rode zin van de server. --}}
            <input type="text" name="name" value="{{ old('name', $user->name) }}">
        </label>

        <label>
            E-mail
            <input type="email" name="email" value="{{ old('email', $user->email) }}">
        </label>

        <div class="form-actions">
            <button type="submit">Opslaan</button>
        </div>
    </form>
@endsection
