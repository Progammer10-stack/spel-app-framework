{{-- De bestelling wordt gekoppeld aan de ingelogde user. Er is geen klant-dropdown. --}}
@extends('layouts.app')

@section('title', 'Bestelling plaatsen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Bestelling plaatsen</h1>
            <p>Kies één spel. De status wordt Nieuw.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('shop.orders.store') }}">
        @csrf

        <label>
            Spel
            {{-- Geen required: een lege keuze gaat naar de server en toont de rode zin. --}}
            <select name="product_id">
                <option value="">Kies een spel</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <div class="form-actions">
            <button type="submit">Bestellen</button>
            <a href="{{ route('shop.orders.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
