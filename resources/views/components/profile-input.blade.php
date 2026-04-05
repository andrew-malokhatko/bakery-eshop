@props([
    'label' => null,
    'type' => 'text',
    'value' => null,
    'name' => null,
    'placeholder' => null,
])

<label {{ $attributes->merge(['class' => 'profile-input']) }}>
    @if ($label)
        <span>{{ $label }}</span>
    @endif

    <input
        type="{{ $type }}"
        @if ($name)
            name="{{ $name }}"
        @endif
        @if ($value !== null)
            value="{{ $value }}"
        @endif
        @if ($placeholder)
            placeholder="{{ $placeholder }}"
        @endif
    />
</label>