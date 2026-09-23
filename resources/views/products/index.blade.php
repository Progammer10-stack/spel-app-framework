@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="page-head">
        <div>
            <h1>Products</h1>
            <p>Spellen met hun category en huidige prijs.</p>
        </div>
    </div>

    <div class="panel">
        @if ($products->isEmpty())
            <p class="empty">Geen products gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Beschrijving</th>
                        <th>Category</th>
                        <th>Prijs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                @if ($product->prices->isNotEmpty())
                                    € {{ number_format($product->prices->last()->price, 2, ',', '.') }}
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
