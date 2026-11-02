{{-- Startpagina voor een gebruiker met de rol User. --}}
@extends('layouts.app')

@section('title', 'Winkel')

@section('content')
    <section class="hero">
        <h1>Welkom in de winkel.</h1>
        <p>Bekijk spellen, plaats een bestelling en schrijf een review.</p>
    </section>

    <section class="cards">
        <a class="card" href="{{ route('shop.products.index') }}">
            <span>Spellen</span>
            <strong>{{ $productCount }}</strong>
        </a>
        <a class="card" href="{{ route('shop.orders.index') }}">
            <span>Mijn bestellingen</span>
            <strong>{{ $orderCount }}</strong>
        </a>
        <a class="card" href="{{ route('shop.reviews.index') }}">
            <span>Mijn reviews</span>
            <strong>{{ $reviewCount }}</strong>
        </a>
    </section>

    @if ($products->isNotEmpty())
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Spel</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><a href="{{ route('shop.products.show', $product) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
