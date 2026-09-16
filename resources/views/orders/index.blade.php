@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <h2>Orders</h2>

    <ul>
        @forelse ($orders as $order)
            <li>Order #{{ $order->id }} - status {{ $order->status }} - {{ $order->ordered_at }}</li>
        @empty
            <li>Geen orders gevonden.</li>
        @endforelse
    </ul>
@endsection
