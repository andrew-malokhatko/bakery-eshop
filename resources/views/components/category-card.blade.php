@props([
    'href' => '#',
    'name' => 'Category',
    'imgSrc' => null,
])

<a 
    href="{{ $href }}" 
    {{ $attributes->merge(['class' => 'category-card']) }}
    @style([
        "background-image: url('{$imgSrc}')" => $imgSrc
    ])
>
    <span>{{ $name }}</span>
</a>