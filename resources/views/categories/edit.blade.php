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

    <form class="panel form" method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        {{-- @method('PUT') vertelt Laravel dat dit een wijziging is, geen nieuw record. --}}
        @method('PUT')

        <label>
            Naam
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
