{{-- Bestaande order. $order en $users komen uit de edit-controller. --}}
@extends('layouts.app')

@section('title', 'Order bewerken')

@section('content')
    <div class="page-head">
        <div>
            <h1>Order bewerken</h1>
            <p>Pas klant, datum of status aan.</p>
        </div>
    </div>

    <form class="panel form" method="POST" action="{{ route('orders.update', $order) }}">
        @csrf
        {{-- @method('PUT') maakt van dit POST-formulier een update. --}}
        @method('PUT')

        <label>
            Klant
            <select name="user_id" required>
                {{-- old(..., $order->user_id) houdt de huidige klant geselecteerd. --}}
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id', $order->user_id) == $user->id)>
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
            {{-- format() maakt van de datum de tekst die het invoerveld verwacht. --}}
            <input type="datetime-local" name="ordered_at" value="{{ old('ordered_at', $order->ordered_at->format('Y-m-d\TH:i')) }}" required>
        </label>
        @error('ordered_at')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Status
            <select name="status" required>
                {{-- @selected vergelijkt de opgeslagen status met 0, 1 of 2. --}}
                <option value="0" @selected(old('status', $order->status) == 0)>Nieuw</option>
                <option value="1" @selected(old('status', $order->status) == 1)>Betaald</option>
                <option value="2" @selected(old('status', $order->status) == 2)>Verzonden</option>
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
