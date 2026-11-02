@extends('layouts.app')

@section('title', 'Review schrijven')

@section('content')
    <div class="page-head">
        <div>
            <h1>Review schrijven</h1>
            <p>De review wordt opgeslagen op jouw account.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('shop.reviews.store') }}">
        @csrf

        <label>
            Spel
            {{-- Geen required: een lege keuze toont de rode zin van de server. --}}
            <select name="product_id">
                <option value="">Kies een spel</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label>
            Review
            <textarea name="comment" rows="4">{{ old('comment') }}</textarea>
        </label>

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('shop.reviews.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
