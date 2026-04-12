{{-- resources/views/components/product-card.blade.php --}}

@props([
    'href' => '#',
    'product' => null,
])

<a {{ $attributes->merge(['class' => 'product-card']) }} href="{{ route('product.show', ['product' => $product]) }}">
    <img class="image" src="{{ $product->images()->first()->url }}" alt="{{ $product->name }}"/>
    <p class="title">{{ $product->name }}</p>
    <p class="desc">{{ $product->description }}</p>
    <form class="content" method="POST" action="{{ route('cart.add', ['product' => $product]) }}">
        @csrf
        <p>{{ number_format((float) ($product?->price ?? 0), 2) }}€</p>
        <input type="hidden" name="quantity" value="1">
        <button type="submit">Add to cart</button>
    </form>
</a>