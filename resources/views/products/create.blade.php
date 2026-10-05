@extends('layouts.app')

@section('title', 'Product toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Product toevoegen</h1>
            <p>Maak een nieuw spel aan.</p>
        </div>
    </div>

    {{-- POST stuurt het formulier naar de store-methode. --}}
    <form class="panel form" method="POST" action="{{ route('products.store') }}">
        {{-- @csrf is verplicht bij elk formulier dat iets opslaat. --}}
        @csrf

        <label>
            Naam
            {{-- old() vult het veld opnieuw in als de validatie faalt. --}}
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            Beschrijving
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </label>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        {{-- Dropdown: de value is het id, de tekst is de naam. --}}
        <label>
            Category
            <select name="category_id" required>
                <option value="">Kies een category</option>
                {{-- @selected zet de gekozen optie terug na een validatiefout. --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="{{ route('products.index') }}">Annuleren</a>
        </div>
    </form>
@endsection
