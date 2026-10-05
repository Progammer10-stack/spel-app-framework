@extends('layouts.app')

@section('title', 'Product bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>Product bewerken</h1>
            <p>Pas naam, beschrijving of category aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <label>
            Naam
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </label>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Beschrijving
            <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
        </label>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-autocomplete
            label="Category"
            name="category_id"
            :items="$categories"
            :value="$product->category_id"
            :text="$product->category->name"
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
