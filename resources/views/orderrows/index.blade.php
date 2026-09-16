@extends('layouts.app')

@section('title', 'Order rows')

@section('content')
    <h2>Order rows</h2>

    <ul>
        @forelse ($orderRows as $orderRow)
            <li>Order {{ $orderRow->order_id }} - product {{ $orderRow->product_id }}</li>
        @empty
            <li>Geen order rows gevonden.</li>
        @endforelse
    </ul>
@endsection
