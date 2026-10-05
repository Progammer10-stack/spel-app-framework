{{-- Bestaande orderregel. $orderRow, $orders en $products komen uit de edit-controller. --}}
@extends('layouts.app')

@section('title', 'Order row bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order row bewerken</h1>
            <p>Kies een andere order of een ander product.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('order-rows.update', $orderRow) }}">
        @csrf
        {{-- @method('PUT') zegt dat de bestaande regel wordt gewijzigd. --}}
        @method('PUT')

        <label>
            Order
            <select name="order_id" required>
                {{-- De huidige order blijft geselecteerd via $orderRow->order_id. --}}
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" @selected(old('order_id', $orderRow->order_id) == $order->id)>
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
                {{-- De huidige productkeuze blijft geselecteerd via $orderRow->product_id. --}}
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id', $orderRow->product_id) == $product->id)>
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
