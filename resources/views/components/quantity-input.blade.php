@props([
    'min' => 1,
    'max' => 20,
    'value' => 1,
    'name' => null,
])

@php
    $currentValue = max((int) $min, min((int) $max, (int) $value));
@endphp

<div {{ $attributes->merge(['class' => 'quantity']) }}>
    <button type="button" class="decrease" data-action="decrease" aria-label="Decrease quantity">&#8722;</button>
    <input
        type="number"
        value="{{ $currentValue }}"
        min="{{ $min }}"
        max="{{ $max }}"
        aria-label="Quantity"
        @if ($name)
            name="{{ $name }}"
        @endif
    />
    <button type="button" class="increase" data-action="increase" aria-label="Increase quantity">&#43;</button>
</div>