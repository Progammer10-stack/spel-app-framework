@extends('layouts.app')

@section('title', 'Examples')

@section('content')
    <div class="page-head">
        <div>
            <h1>Examples</h1>
            <p>Voorbeeldrecords uit de examples-tabel.</p>
        </div>
    </div>

    <div class="panel">
        @if ($examples->isEmpty())
            <p class="empty">Geen examples gevonden.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($examples as $example)
                        <tr>
                            <td>{{ $example->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
