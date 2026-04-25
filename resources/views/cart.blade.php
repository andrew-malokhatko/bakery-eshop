<x-layout>
    <div class="cart">
        @if ($cart === null || $cart->products->isEmpty())
            <p class="empty-cart">Your cart is empty.</p>
        @else
            <div class="content">
                @foreach ($cart->products as $product)
                    <x-cart-entry :product="$product" />
                @endforeach
            </div>
            <div class="sidebar">
                <h2>Cart Summary</h2>
                <ul class="sumup">
                        
                    @foreach($cart->products as $product)
                        <li class="entry">
                            <span>{{ $product->name }} ({{ (int) ($product->pivot->quantity ?? 0) }})</span>
                            <span>{{ number_format((float) ($product->price * ((int) ($product->pivot->quantity ?? 0))), 2) }} €</span>
                        </li>
                    @endforeach
                </ul>
                <hr>
                <div class="total">
                    <span>Total: </span>
                    <span>{{ number_format((float) $cart->products->sum(function ($product) {
                        return $product->price * ((int) ($product->pivot->quantity ?? 0));
                    }), 2) }} €
                    </span>
                </div>
                <a href="{{ route('checkout') }}" class="cart-checkout-btn">Checkout</a>
            </div>
        @endif
    </div>
</x-layout>