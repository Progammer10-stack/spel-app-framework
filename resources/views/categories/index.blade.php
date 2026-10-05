{{-- @extends gebruikt de layout. Het menu en de header komen daar vandaan. --}}
@extends('layouts.app')

{{-- Deze titel komt in de <title> van de layout terecht. --}}
@section('title', 'Categories')

@section('content')
    <div class="page-head">
        <div>
            <h1>Categories</h1>
            <p>Alle spelcategorieën en hoeveel products erin zitten.</p>
        </div>
        {{-- route() maakt de URL van de benoemde route categories.create. --}}
        <a class="button" href="{{ route('categories.create') }}">Category toevoegen</a>
    </div>

    <div class="panel">
        {{-- isEmpty() is true als de controller geen categories heeft gevonden. --}}
        @if ($categories->isEmpty())
            <p class="empty">Geen categories gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Products</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Eén tabelrij per category. $categories komt uit de index-controller. --}}
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            {{-- products_count komt uit withCount('products') in de controller. --}}
                            <td>{{ $category->products_count }}</td>
                            <td class="actions">
                                <a class="button" href="{{ route('categories.edit', $category) }}">Bewerken</a>
                                {{-- Verwijderen gaat via een formulier. confirm() vraagt eerst "weet je het zeker?". --}}
                                <form method="POST" action="{{ route('categories.delete', $category) }}" onsubmit="return confirm('Deze category verwijderen?')">
                                    @csrf
                                    {{-- HTML kent geen DELETE. @method zegt Laravel dat dit verwijderen is. --}}
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
