@extends('layouts.app')

@section('title', 'Review bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>Review bewerken</h1>
            <p>Pas product, klant of comment aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('reviews.update', $review) }}">
        @csrf
        @method('PUT')

        <x-autocomplete
            label="Product"
            name="product_id"
            :items="$products"
            :value="$review->product_id"
            :text="$review->product->name"
        />
        @error('product_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-autocomplete
            label="Klant"
            name="user_id"
            :items="$users"
            :value="$review->user_id"
            :text="$review->user->name"
        />
        @error('user_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Comment
            <textarea name="comment" rows="4" required>{{ old('comment', $review->comment) }}</textarea>
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
