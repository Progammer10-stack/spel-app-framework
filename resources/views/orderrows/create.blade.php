{{-- Leeg formulier. $orders en $products komen uit de create-controller. --}}
@extends('layouts.app')

@section('title', 'Order row toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order row toevoegen</h1>
            <p>Koppel een product aan een bestelling.</p>
        </div>
    </div>

    {{-- POST stuurt order_id en product_id naar order-rows.store. --}}
    <form class="panel form" method="POST" action="{{ route('order-rows.store') }}">
        @csrf

        <label>
            Order
            <select name="order_id" required>
                <option value="">Kies een order</option>
                {{-- De optietekst toont ordernummer en klantnaam. Opgeslagen wordt alleen het id. --}}
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" @selected(old('order_id') == $order->id)>
                        #{{ $order->id }} — {{ $order->user->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('order_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Product
            <select name="product_id" required>
                <option value="">Kies een product</option>
                {{-- Zelfde idee: value is het product-id, de tekst is de productnaam. --}}
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

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('order-rows.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
