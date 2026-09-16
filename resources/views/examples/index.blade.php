@extends('layouts.app')

@section('title', 'Examples')

@section('content')
    <h2>Examples</h2>

    <ul>
        @forelse ($examples as $example)
            <li>{{ $example->name }}</li>
        @empty
            <li>Geen examples gevonden.</li>
        @endforelse
    </ul>
@endsection
