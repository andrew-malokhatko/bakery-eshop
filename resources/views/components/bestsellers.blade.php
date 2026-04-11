@props([
    'title' => 'Bestsellers',
    'products' => collect(),
])

<section {{ $attributes->merge(['class' => 'bestsellers']) }}>
    <h2 class="title">{{ $title }}</h2>
    <div class="products">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
</section>