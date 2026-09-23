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

        <label>
            Product
            <select name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id', $review->product_id) == $product->id)>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('product_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Klant
            <select name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id', $review->user_id) == $user->id)>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </label>
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
