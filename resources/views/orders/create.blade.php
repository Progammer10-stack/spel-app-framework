@extends('layouts.app')

@section('title', 'Order toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order toevoegen</h1>
            <p>Maak een nieuwe bestelling aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('orders.store') }}">
        @csrf

        <x-autocomplete
            label="Klant"
            name="user_id"
            :items="$users"
            :value="null"
        />
        @error('user_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Datum
            <input type="datetime-local" name="ordered_at" value="{{ old('ordered_at') }}" required>
        </label>
        @error('ordered_at')
            <p class="error">{{ $message }}</p>
        @enderror

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
