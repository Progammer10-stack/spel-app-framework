@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page-head">
        <div>
            <h1>Users</h1>
            <p>Accounts en hun rol.</p>
        </div>
    </div>

    <div class="panel">
        @if ($users->isEmpty())
            <p class="empty">Geen users gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>E-mail</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge">{{ $user->role->name }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
