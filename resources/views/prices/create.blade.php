{{-- Leeg formulier. $products komt uit de create-controller. --}}
@extends('layouts.app')

@section('title', 'Price toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Price toevoegen</h1>
            <p>Voeg een prijs toe voor een product.</p>
        </div>
    </div>

    {{-- POST stuurt product_id, price en effective_date naar prices.store. --}}
    <form class="panel form" method="POST" action="{{ route('prices.store') }}">
        @csrf

        <label>
            Product
            <select name="product_id" required>
                <option value="">Kies een product</option>
                {{-- value is het product-id. De tekst is de naam van het spel. --}}
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('product_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Prijs
            {{-- step="0.01" zodat je centen kunt invullen. min="0" blokkeert een negatief bedrag. --}}
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" required>
        </label>
        @error('price')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Geldig vanaf
            {{-- type="date" stuurt een datum zonder tijd, bijvoorbeeld 2026-10-05. --}}
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
