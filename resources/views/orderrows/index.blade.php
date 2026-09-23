@extends('layouts.app')

@section('title', 'Order rows')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order rows</h1>
            <p>Welk product bij welke bestelling hoort.</p>
        </div>
    </div>

    <div class="panel">
        @if ($orderRows->isEmpty())
            <p class="empty">Geen order rows gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Klant</th>
                        <th>Product</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderRows as $orderRow)
                        <tr>
                            <td>#{{ $orderRow->order_id }}</td>
                            <td>{{ $orderRow->order->user->name }}</td>
                            <td>{{ $orderRow->product->name }}</td>
                            <td class="actions">
                                <a class="button" href="{{ route('order-rows.edit', $orderRow) }}">Bewerken</a>
                                <form method="POST" action="{{ route('order-rows.delete', $orderRow) }}" onsubmit="return confirm('Deze order row verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button danger" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
