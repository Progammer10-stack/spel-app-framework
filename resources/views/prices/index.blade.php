@extends('layouts.app')

@section('title', 'Prices')

@section('content')
    <div class="page-head">
        <div>
            <h1>Prices</h1>
            <p>Prijzen per product en vanaf wanneer ze gelden.</p>
        </div>
    </div>

    <div class="panel">
        @if ($prices->isEmpty())
            <p class="empty">Geen prices gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Prijs</th>
                        <th>Geldig vanaf</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{ $price->product->name }}</td>
                            <td>€ {{ number_format($price->price, 2, ',', '.') }}</td>
                            <td>{{ $price->effective_date->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
