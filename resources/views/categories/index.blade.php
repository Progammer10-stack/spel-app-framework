@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="page-head">
        <div>
            <h1>Categories</h1>
            <p>Alle spelcategorieën en hoeveel products erin zitten.</p>
        </div>
        <a class="button" href="{{ route('categories.create') }}">Category toevoegen</a>
    </div>

    <div class="panel">
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products_count }}</td>
                            <td class="actions">
                                <a class="button" href="{{ route('categories.edit', $category) }}">Bewerken</a>
                                <form method="POST" action="{{ route('categories.delete', $category) }}" onsubmit="return confirm('Deze category verwijderen?')">
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
