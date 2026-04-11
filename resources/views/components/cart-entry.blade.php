@props([
    'product' => null,
])

<div {{ $attributes->merge(['class' => 'cart-entry']) }}>
    <div class="cart-product">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
        <span>{{ $product['name'] }}</span>
    </div>
    <p class="unit-price">{{ $product['price'] }}€/ks</p>
    
    <x-quantity-input value="{{ $product['quantity'] }}"></x-quantity-input>
    
    <p class="total max-price">{{ $product['price'] * $product['quantity'] }}€</p>
    
    <form action="{{ route('cart.remove', ['product' => $product['id']]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">
            <img src="{{ asset('images/cross.svg') }}" alt="Remove">
        </button>
    </form>
</div>