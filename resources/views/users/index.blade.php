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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- role is de relatie. De naam is Admin of User. --}}
                            <td><span class="badge">{{ $user->role->name }}</span></td>
                            <td class="actions">
                                <a class="button" href="{{ route('users.edit', $user) }}">Bewerken</a>
                                <form method="POST" action="{{ route('users.delete', $user) }}" onsubmit="return confirm('Deze user verwijderen?')">
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
