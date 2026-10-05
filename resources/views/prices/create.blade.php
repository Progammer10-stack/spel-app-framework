@extends('layouts.app')

@section('title', 'Price toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Price toevoegen</h1>
            <p>Voeg een prijs toe voor een product.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('prices.store') }}">
        @csrf

        <x-autocomplete
            label="Product"
            name="product_id"
            :items="$products"
            :value="null"
        />
        @error('product_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Prijs
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" required>
        </label>
        @error('price')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Geldig vanaf
            <input type="date" name="effective_date" value="{{ old('effective_date') }}" required>
        </label>
        @error('effective_date')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('prices.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
