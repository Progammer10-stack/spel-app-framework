{{-- Leeg formulier. $users komt uit de create-controller, voor de klantdropdown. --}}
@extends('layouts.app')

@section('title', 'Order toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order toevoegen</h1>
            <p>Maak een nieuwe bestelling aan.</p>
        </div>
    </div>

    {{-- POST stuurt user_id, ordered_at en status naar orders.store. --}}
    <form class="panel form" method="POST" action="{{ route('orders.store') }}">
        @csrf

        <label>
            Klant
            <select name="user_id" required>
                <option value="">Kies een klant</option>
                {{-- value is het user-id dat wordt opgeslagen. De tekst is alleen de naam. --}}
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('user_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Datum
            {{-- datetime-local verwacht een datum met tijd, bijvoorbeeld 2026-10-05T14:30. --}}
            <input type="datetime-local" name="ordered_at" value="{{ old('ordered_at') }}" required>
        </label>
        @error('ordered_at')
            <p class="error">{{ $message }}</p>
        @enderror

        {{-- Status is een getal in de database: 0 = nieuw, 1 = betaald, 2 = verzonden. --}}
        <label>
            Status
            <select name="status" required>
                <option value="0" @selected(old('status', '0') == 0)>Nieuw</option>
                <option value="1" @selected(old('status') == 1)>Betaald</option>
                <option value="2" @selected(old('status') == 2)>Verzonden</option>
            </select>
        </label>
        @error('status')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('orders.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
