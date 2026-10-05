{{-- Leeg formulier. $categories komt uit de create-controller, voor de dropdown. --}}
@extends('layouts.app')

@section('title', 'Product toevoegen')

@section('content')
    <div class="page-head">
        <div>
            <h1>Product toevoegen</h1>
            <p>Maak een nieuw spel aan.</p>
        </div>
    </div>

    {{-- POST stuurt naam, beschrijving en category_id naar products.store. --}}
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
            {{-- Dit veld mag leeg zijn. In de controller staat de regel nullable. --}}
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </label>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        {{-- Dropdown: value is het id dat wordt opgeslagen, de tekst is de categorynaam. --}}
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
