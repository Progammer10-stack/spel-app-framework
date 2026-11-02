@extends('layouts.app')

@section('title', 'Mijn reviews')

@section('content')
    <div class="page-head">
        <div>
            <h1>Mijn reviews</h1>
            <p>Reviews die jij hebt geschreven.</p>
        </div>
        <a class="button" href="{{ route('shop.reviews.create') }}">Review schrijven</a>
    </div>

    <div class="panel">
        @if ($reviews->isEmpty())
            <p class="empty">Je hebt nog geen reviews.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Spel</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->product->name }}</td>
                            <td>{{ $review->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
