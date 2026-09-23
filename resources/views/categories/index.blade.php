@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="page-head">
        <div>
            <h1>Categories</h1>
            <p>Alle spelcategorieën en hoeveel products erin zitten.</p>
        </div>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
