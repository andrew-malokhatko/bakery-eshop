<x-layout>
    <div class="cart">
        <div class="content">
            <x-cart-entry />
            <x-cart-entry />
            <x-cart-entry />
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
    </div>
</x-layout>