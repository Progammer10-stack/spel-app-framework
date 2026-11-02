{{-- Happy = groene zin. Unhappy = rode zin. De melding verdwijnt na een refresh. --}}
@if (session('success'))
    <p class="notice success">{{ session('success') }}</p>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="notice failure">{{ $message }}</p>
    @endforeach
@endif
