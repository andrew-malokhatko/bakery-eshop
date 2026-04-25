@props([
    'product' => null,
])

<div {{ $attributes->merge(['class' => 'cart-entry']) }}>
    <div class="cart-product">
        <img src="{{ $product?->images?->first()?->url }}" alt="{{ $product?->name }}">
        <span>{{ $product?->name }}</span>
    </div>
    <p class="unit-price">{{ $product?->price }}€/ks</p>
    
    <x-quantity-input :value="(int) ($product?->pivot?->quantity ?? 0)"></x-quantity-input>
    
    <p class="total max-price">{{ $product?->price * ((int) ($product?->pivot?->quantity ?? 0)) }}€</p>
    
    <form action="{{ route('cart.remove', ['product' => $product?->id]) }}" method="POST" class="remove-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="remove-btn" aria-label="Remove {{ $product?->name }} from cart">
            <img src="{{ asset('images/cross.svg') }}" alt="Remove">
        </button>
    </form>
</div>