@extends('layouts.app')

@section('title', 'Category toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Category toevoegen</h1>
            <p>Maak een nieuwe spelcategorie aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('categories.store') }}">
        @csrf

        <label>
            Naam
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('categories.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
