{{-- Home. $counts komt uit de route in web.php. --}}
@extends('layouts.app')

@section('title', 'Spel App')

@section('content')
    <section class="hero">
        <h1>Spellen voor elke tafel.</h1>
        <p>Bekijk categories, products, prijzen, orders en reviews uit de database.</p>
    </section>

    <section class="cards">
        <a class="card" href="{{ route('categories.index') }}">
            <span>Categories</span>
            {{-- Het getal komt uit de route in web.php. --}}
            <strong>{{ $counts['categories'] }}</strong>
        </a>
        <a class="card" href="{{ route('products.index') }}">
            <span>Products</span>
            <strong>{{ $counts['products'] }}</strong>
        </a>
        <a class="card" href="{{ route('orders.index') }}">
            <span>Orders</span>
            <strong>{{ $counts['orders'] }}</strong>
        </a>
        <a class="card" href="{{ route('reviews.index') }}">
            <span>Reviews</span>
            <strong>{{ $counts['reviews'] }}</strong>
        </a>
        <a class="card" href="{{ route('users.index') }}">
            <span>Users</span>
            <strong>{{ $counts['users'] }}</strong>
        </a>
    </section>
@endsection
