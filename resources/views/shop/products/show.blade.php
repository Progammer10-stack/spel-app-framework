@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="page-head">
        <div>
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->category->name }}</p>
        </div>
        <a class="button" href="{{ route('shop.orders.create') }}">Bestellen</a>
    </div>

    <div class="panel">
        <div class="panel-body">
            <p>{{ $product->description ?: 'Geen beschrijving.' }}</p>
            <p>
                @if ($product->prices->isNotEmpty())
                    Prijs: € {{ number_format($product->prices->first()->price, 2, ',', '.') }}
                @else
                    Nog geen prijs.
                @endif
            </p>
            <a href="{{ route('shop.reviews.create') }}">Schrijf een review</a>
        </div>
    </div>

    <div class="panel shop-gap">
        @if ($product->reviews->isEmpty())
            <p class="empty">Nog geen reviews.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Klant</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->reviews as $review)
                        <tr>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
