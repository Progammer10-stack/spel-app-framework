{{-- Zelfde formulier als create, maar gevuld met de bestaande category. --}}
@extends('layouts.app')

@section('title', 'Category bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>Category bewerken</h1>
            <p>Pas de naam aan en sla op.</p>
        </div>
    </div>

    {{-- $category komt uit de edit-controller. Het id zit in de URL. --}}
    <form class="panel form" method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        {{-- HTML-forms kennen geen PUT. @method zegt Laravel dat dit een wijziging is. --}}
        @method('PUT')

        <label>
            Naam
            {{-- old('name', $category->name): bij een fout de nieuwe invoer, anders de naam uit de database. --}}
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
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
