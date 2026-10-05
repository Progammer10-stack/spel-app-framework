@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="page-head">
        <div>
            <h1>Products</h1>
            <p>Spellen met hun category en huidige prijs.</p>
        </div>
        <a class="button" href="{{ route('products.create') }}">Product toevoegen</a>
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
                        <th></th>
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
                            <td class="actions">
                                <a class="button" href="{{ route('products.edit', $product) }}">Bewerken</a>
                                <form method="POST" action="{{ route('products.delete', $product) }}" onsubmit="return confirm('Dit product verwijderen?')">
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
