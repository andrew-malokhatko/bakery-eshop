{{-- resources/views/components/product-card.blade.php --}}

@props([
    'href' => route('product'),
    'imgSrc' => 'https://placehold.co/400x300/fdf2f8/7e22ce?text=Product',
    'title' => 'Product',
    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
    'price' => '5.50'
])

<a {{ $attributes->merge(['class' => 'product-card']) }} href="{{ $href }}">
    <img class="image" src="{{ $imgSrc }}" alt="{{ $title }}"/>
    <p class="title">{{ $title }}</p>
    <p class="desc">{{ $desc }}</p>
    <div class="content">
        <p>{{ $price }}€</p>
        <button type="button">Add to cart</button>
    </div>
</a>