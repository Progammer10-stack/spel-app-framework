@extends('layouts.app')

@section('title', 'Order row toevoegen')

@section('content')
    @php
        $orderOptions = $orders->map(fn ($order) => [
            'id' => $order->id,
            'label' => '#'.$order->id.' — '.$order->user->name,
        ]);
    @endphp

    <div class="page-head">
        <div>
            <h1>Order row toevoegen</h1>
            <p>Koppel een product aan een bestelling.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('order-rows.store') }}">
        @csrf

        <x-autocomplete
            label="Order"
            name="order_id"
            :items="$orderOptions"
            :value="null"
        />
        @error('order_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-autocomplete
            label="Product"
            name="product_id"
            :items="$products"
            :value="null"
        />
        @error('product_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('order-rows.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
