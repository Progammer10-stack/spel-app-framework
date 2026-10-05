@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <div class="page-head">
        <div>
            <h1>Reviews</h1>
            <p>Wat klanten over de spellen schrijven.</p>
        </div>
        <a class="button" href="{{ route('reviews.create') }}">Review toevoegen</a>
    </div>

    <div class="panel">
        @if ($reviews->isEmpty())
            <p class="empty">Geen reviews gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Klant</th>
                        <th>Comment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->product->name }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->comment }}</td>
                            <td class="actions">
                                <a class="button" href="{{ route('reviews.edit', $review) }}">Bewerken</a>
                                <form method="POST" action="{{ route('reviews.delete', $review) }}" onsubmit="return confirm('Deze review verwijderen?')">
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
