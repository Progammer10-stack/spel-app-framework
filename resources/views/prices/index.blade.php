@extends('layouts.app')

@section('title', 'Prices')

@section('content')
    <h2>Prices</h2>

    <ul>
        @forelse ($prices as $price)
            <li>{{ $price->price }} (vanaf {{ $price->effective_date }})</li>
        @empty
            <li>Geen prices gevonden.</li>
        @endforelse
    </ul>
@endsection
