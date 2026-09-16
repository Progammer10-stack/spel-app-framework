@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h2>Users</h2>

    <ul>
        @forelse ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @empty
            <li>Geen users gevonden.</li>
        @endforelse
    </ul>
@endsection
