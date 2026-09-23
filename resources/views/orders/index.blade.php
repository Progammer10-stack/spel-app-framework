@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="page-head">
        <div>
            <h1>Orders</h1>
            <p>Bestellingen van klanten, met status en aantal regels.</p>
        </div>
    </div>

    <div class="panel">
        @if ($orders->isEmpty())
            <p class="empty">Geen orders gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Klant</th>
                        <th>Datum</th>
                        <th>Status</th>
                        <th>Regels</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->ordered_at->format('d-m-Y H:i') }}</td>
                            <td>
                                @php
                                    $status = match ($order->status) {
                                        1 => ['Betaald', 'paid'],
                                        2 => ['Verzonden', 'sent'],
                                        default => ['Nieuw', ''],
                                    };
                                @endphp
                                <span class="badge {{ $status[1] }}">{{ $status[0] }}</span>
                            </td>
                            <td>{{ $order->orderRows->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
