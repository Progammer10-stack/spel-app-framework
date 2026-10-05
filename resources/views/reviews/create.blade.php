{{-- Twee dropdowns: product_id en user_id gaan naar de store-controller. --}}
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

        <label>
            Product
            <select name="product_id" required>
                <option value="">Kies een product</option>
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
            Klant
            <select name="user_id" required>
                <option value="">Kies een klant</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
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
