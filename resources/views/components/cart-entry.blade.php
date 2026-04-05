@props([
    'imgSrc' => 'https://placehold.co/120x120/fdf2f8/7e22ce?text=Product',
    'title' => 'Bakery Product',
    'unitPrice' => '0.00',
    'totalPrice' => '5.50',
    'quantity' => '1',
])

<div {{ $attributes->merge(['class' => 'cart-entry']) }}>
    <div class="cart-product">
        <img src="{{ $imgSrc }}" alt="{{ $title }}">
        <span>{{ $title }}</span>
    </div>
    <p class="unit-price">{{ $unitPrice }}€/ks</p>
    
    <x-quantity-input value="{{ $quantity }}"></x-quantity-input>
    
    <p class="total max-price">{{ $totalPrice }}€</p>
    
    <button type="button">
        <img src="{{ asset('images/cross.svg') }}" alt="Remove">
    </button>
</div>