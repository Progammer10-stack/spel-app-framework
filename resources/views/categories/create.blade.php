{{-- Leeg formulier. De store-controller slaat de naam op. --}}
@extends('layouts.app')

{{-- Deze tekst komt in het tabblad van de browser. --}}
@section('title', 'Category toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Category toevoegen</h1>
            <p>Maak een nieuwe spelcategorie aan.</p>
        </div>
    </div>

    {{-- POST stuurt de invoer naar categories.store. --}}
    <form class="panel form" method="POST" action="{{ route('categories.store') }}">
        {{-- @csrf is verplicht. Zonder dit token weigert Laravel het formulier. --}}
        @csrf

        <label>
            Naam
            {{-- name="name" hoort bij de kolom name. old() vult het veld opnieuw na een fout. --}}
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>
        {{-- @error toont de melding als de naam leeg of langer dan 255 tekens is. --}}
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            {{-- Annuleren gaat terug naar de lijst, zonder iets op te slaan. --}}
            <a href="{{ route('categories.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
