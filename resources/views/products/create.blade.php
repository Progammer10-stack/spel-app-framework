@extends('layouts.app')

@section('title', 'Product toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Product toevoegen</h1>
            <p>Maak een nieuw spel aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('products.store') }}">
        @csrf

        <label>
            Naam
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Beschrijving
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </label>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-autocomplete
            label="Category"
            name="category_id"
            :items="$categories"
            :value="null"
        />
        @error('category_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('products.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
