@extends('layouts.app')

@section('title', 'Mijn bestellingen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Mijn bestellingen</h1>
            <p>Alleen bestellingen van jouw account.</p>
        </div>
        <a class="button" href="{{ route('shop.orders.create') }}">Bestelling plaatsen</a>
    </div>

    <div class="panel">
        @if ($orders->isEmpty())
            <p class="empty">Je hebt nog geen bestellingen.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Datum</th>
                        <th>Status</th>
                        <th>Spel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->ordered_at->format('d-m-Y H:i') }}</td>
                            <td>
                                @php
                                    $status = match ($order->status) {
                                        1 => 'Betaald',
                                        2 => 'Verzonden',
                                        default => 'Nieuw',
                                    };
                                @endphp
                                {{ $status }}
                            </td>
                            <td>{{ $order->orderRows->pluck('product.name')->join(', ') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
