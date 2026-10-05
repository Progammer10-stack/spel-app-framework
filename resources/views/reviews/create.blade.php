{{-- Leeg formulier. $products en $users komen uit de create-controller. --}}
@extends('layouts.app')

@section('title', 'Review toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Review toevoegen</h1>
            <p>Schrijf een nieuwe review voor een product.</p>
        </div>
    </div>

    {{-- POST stuurt product_id, user_id en comment naar reviews.store. --}}
    <form class="panel form" method="POST" action="{{ route('reviews.store') }}">
        @csrf

        <label>
            Product
            <select name="product_id" required>
                <option value="">Kies een product</option>
                {{-- Opgeslagen wordt het product-id, niet de naam. --}}
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
                {{-- Opgeslagen wordt het user-id van de klant die de review schrijft. --}}
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
            {{-- required: de reviewtekst mag niet leeg zijn. --}}
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
