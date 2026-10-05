{{-- Deze pagina komt uit bootstrap/app.php als MySQL niet bereikbaar is. --}}
@extends('layouts.app')

@section('title', 'Database niet bereikbaar')

@section('content')
    <section class="hero">
        <h1>Database niet bereikbaar</h1>
        <p>MAMP staat uit, of MySQL draait niet. Start MAMP en ververs deze pagina.</p>
    </section>
@endsection
