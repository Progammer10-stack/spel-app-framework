@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <h2>Reviews</h2>

    <ul>
        @forelse ($reviews as $review)
            <li>{{ $review->comment }}</li>
        @empty
            <li>Geen reviews gevonden.</li>
        @endforelse
    </ul>
@endsection
