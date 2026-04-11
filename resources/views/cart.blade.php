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

                    <!-- TODO: separate small component-->
                    <div class="entry">
                        <span>Product1</span>
                        <span>24.99€</span>
                    </div>
                    <div class="entry">
                        <span>Product1</span>
                        <span>24.99€</span>
                    </div>
                    <div class="entry">
                        <span>Product1</span>
                        <span>24.99€</span>
                    </div>
                    <div class="entry">
                        <span>Product1</span>
                        <span>24.99€</span>
                    </div>
                </ul>
                <hr>
                <div class="total">
                    <span>Total: </span>
                    <span>129.59€</span>
                </div>
                <a href="{{ route('checkout') }}" class="cart-checkout-btn">Checkout</a>
            </div>
        @endif
    </div>
</x-layout>