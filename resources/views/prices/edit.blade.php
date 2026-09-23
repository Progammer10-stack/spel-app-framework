@extends('layouts.app')

@section('title', 'Price bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>Price bewerken</h1>
            <p>Pas product, bedrag of datum aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('prices.update', $price) }}">
        @csrf
        @method('PUT')

        <label>
            Product
            <select name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id', $price->product_id) == $product->id)>
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
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $price->price) }}" required>
        </label>
        @error('price')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Geldig vanaf
            <input type="date" name="effective_date" value="{{ old('effective_date', $price->effective_date->format('Y-m-d')) }}" required>
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
