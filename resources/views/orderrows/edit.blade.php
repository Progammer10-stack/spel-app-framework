@extends('layouts.app')

@section('title', 'Order row bewerken')

@section('content')
    @php
        $orderOptions = $orders->map(fn ($order) => [
            'id' => $order->id,
            'label' => '#'.$order->id.' — '.$order->user->name,
        ]);
    @endphp

    <div class="page-head">
        <div>
            <h1>Order row bewerken</h1>
            <p>Kies een andere order of een ander product.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('order-rows.update', $orderRow) }}">
        @csrf
        @method('PUT')

        <x-autocomplete
            label="Order"
            name="order_id"
            :items="$orderOptions"
            :value="$orderRow->order_id"
        />
        @error('order_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-autocomplete
            label="Product"
            name="product_id"
            :items="$products"
            :value="$orderRow->product_id"
            :text="$orderRow->product->name"
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
