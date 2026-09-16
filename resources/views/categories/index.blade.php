@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h2>Categories</h2>

    <ul>
        @forelse ($categories as $category)
            <li>{{ $category->name }}</li>
        @empty
            <li>Geen categories gevonden.</li>
        @endforelse
    </ul>
@endsection
