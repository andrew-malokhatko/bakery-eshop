<x-layout>
    <div class="cart">
        @if (count($cart) == 0)
            <p class="empty-cart">Your cart is empty.</p>
        @else
            <div class="content">
                @foreach ($cart as $product)
                    <x-cart-entry :product="$product" />
                @endforeach
            </div>
            <div class="sidebar">
                <h2>Cart Summary</h2>
                <ul class="sumup">
                        
                    @foreach($cart as $product)
                        <li class="entry">
                            <span>{{ $product['name'] }} ({{ $product['quantity'] }})</span>
                            <span>{{ number_format((float) ($product['price'] * $product['quantity'] ?? 0), 2) }} €</span>
                        </li>
                    @endforeach
                </ul>
                <hr>
                <div class="total">
                    <span>Total: </span>
                    <span>{{ number_format((float) array_sum(array_map(function ($product) {
                        return $product['price'] * $product['quantity'] ?? 0;
                    }, $cart)), 2) }} €
                    </span>
                </div>
                <a href="{{ route('checkout') }}" class="cart-checkout-btn">Checkout</a>
            </div>
        @endif
    </div>
</x-layout>