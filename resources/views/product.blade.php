<x-layout>
    @php
        $product = $product ?? null;
    @endphp

    <section class="product">
        <img src="{{ optional($product?->images->first())->url ?? asset('images/chocolate-roll.jpg') }}"/>
        <div class="content">
            <h1 class="price">{{ $product?->name ?? 'Product' }}</h1>
            <p class="desc">{{ $product?->description ?? 'Product description is not available.' }}</p>
            <hr />
            <p class="price">{{ number_format((float) ($product?->price ?? 0), 2) }} €</p>
            <form class="actions" action="{{ route('cart.add', ['product' => $product]) }}" method="POST">
                @csrf
                <x-quantity-input name="quantity" min="1" max="20" value="1"></x-quantity-input>
                <button type="submit">Add to cart</button>
            </form>
        </div>
    </section>

    <section class="product-info">
        <div class="desc">
            <h2>Description</h2>
            <p>{{ $product?->description ?? 'Product description is not available.' }}</p>
        </div>
        <div class="ingredients">
            <h2>Ingredients</h2>
            <ul>
                <li>Flour</li>
                <li>Cocoa powder</li>
                <li>Eggs</li>
                <li>Cream and fresh berries</li>
            </ul>
        </div>
        <div class="allergens">
            <h2>Allergens</h2>
            <ul>
                <li>Gluten</li>
                <li>Milk</li>
                <li>Eggs</li>
                <li>May contain nuts</li>
            </ul>
        </div>
    </section>

    <x-bestsellers title="We also recommend you try:" :products="$bestsellerProducts" />
</x-layout>