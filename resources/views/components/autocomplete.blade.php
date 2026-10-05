@props([
    'label',
    'name',
    'items',
    'value',
    'text' => null,
])

@php
    $options = collect($items)
        ->map(function ($item) {
            if (is_array($item)) {
                return [
                    'id' => $item['id'],
                    'label' => (string) ($item['label'] ?? $item['name']),
                ];
            }

            return [
                'id' => $item->id,
                'label' => (string) ($item->label ?? $item->name),
            ];
        })
        ->values();

    $selectedId = old($name, $value);
    $match = $options->first(fn ($option) => (string) $option['id'] === (string) $selectedId);
    $selectedLabel = $match['label'] ?? $text ?? '';
@endphp

<label {{ $attributes->class(['autocomplete']) }} data-autocomplete>
    {{ $label }}
    <input
        type="text"
        value="{{ $selectedLabel }}"
        autocomplete="off"
        placeholder="Typ minstens 3 letters…"
        required
        data-autocomplete-input
    >
    <input type="hidden" name="{{ $name }}" value="{{ $selectedId }}" data-autocomplete-value>
    <ul class="autocomplete-list" data-autocomplete-list hidden></ul>
    <script type="application/json" data-autocomplete-items>@json($options)</script>
</label>
