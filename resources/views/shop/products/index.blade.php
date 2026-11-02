@extends('layouts.app')

@section('title', 'Spellen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Spellen</h1>
            <p>Kies een spel om de prijs en reviews te zien.</p>
        </div>
    </div>

    <div class="panel">
        @if ($products->isEmpty())
            <p class="empty">Er zijn nog geen spellen.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Category</th>
                        <th>Prijs</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                @if ($product->prices->isNotEmpty())
                                    € {{ number_format($product->prices->first()->price, 2, ',', '.') }}
                                @else
                                    —
                                @endif
                            </td>
                            <td class="actions">
                                <a class="button" href="{{ route('shop.products.show', $product) }}">Bekijken</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
