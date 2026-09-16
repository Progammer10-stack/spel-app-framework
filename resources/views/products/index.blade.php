@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h2>Products</h2>

    <ul>
        @forelse ($products as $product)
            <li>{{ $product->name }} - {{ $product->description }}</li>
        @empty
            <li>Geen products gevonden.</li>
        @endforelse
    </ul>
@endsection
