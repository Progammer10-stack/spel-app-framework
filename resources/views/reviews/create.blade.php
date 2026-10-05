@extends('layouts.app')

@section('title', 'Review toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Review toevoegen</h1>
            <p>Schrijf een nieuwe review voor een product.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('reviews.store') }}">
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

        <x-autocomplete
            label="Klant"
            name="user_id"
            :items="$users"
            :value="null"
        />
        @error('user_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Comment
            <textarea name="comment" rows="4" required>{{ old('comment') }}</textarea>
        </label>
        @error('comment')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('reviews.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
