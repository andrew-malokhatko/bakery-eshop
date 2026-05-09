<x-layout title="Checkout - Bakery">
    <div class="checkout-page">
        <div class="checkout-steps">
            <div class="step-item active">
                <span class="step-number">1</span>
                <span>Details</span>
            </div>
            <div class="step-line"></div>
            <div class="step-item">
                <span class="step-number">2</span>
                <span>Payment</span>
            </div>
            <div class="step-line"></div>
            <div class="step-item">
                <span class="step-number">3</span>
                <span>Review</span>
            </div>
        </div>

        <div class="checkout-layout">
            <main class="checkout-main">
                <section class="checkout-card">
                    <h1>Checkout</h1>
                    <p class="checkout-subtitle">Fill in your delivery and contact information.</p>

                    @if ($errors->any())
                    <div class="form-errors">
                        <strong>Please fix the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="checkout-form" method="POST" action="{{ route('checkout.save') }}">
                        @csrf

                        <div class="form-block">
                            <h2>Contact information</h2>

                            <div class="form-grid">
                                <input type="text" name="first_name" placeholder="First name" value="{{ old('first_name', session('checkout.first_name')) }}" required>
                                <input type="text" name="last_name" placeholder="Last name" value="{{ old('last_name', session('checkout.last_name')) }}" required>
                                <input type="email" name="email" placeholder="Email" value="{{ old('email', session('checkout.email')) }}" required>
                                <input type="text" name="phone" placeholder="Phone" value="{{ old('phone', session('checkout.phone')) }}" required>
                            </div>
                        </div>

                        <div class="form-block">
                            <h2>Delivery address</h2>

                            <div class="form-grid">
                                <input class="full" type="text" name="street" placeholder="Street and house number" value="{{ old('street', session('checkout.street')) }}" required>
                                <input type="text" name="city" placeholder="City" value="{{ old('city', session('checkout.city')) }}" required>
                                <input type="text" name="zip" placeholder="ZIP code" value="{{ old('zip', session('checkout.zip')) }}" required>
                            </div>
                        </div>

                        <div class="form-block">
                            <h2>Delivery method</h2>

                            <div class="delivery-options">
                                <label class="delivery-option">
                                    <input type="radio" name="delivery_method" value="courier"
                                           @checked(old('delivery_method', session('checkout.delivery_method', 'courier')) === 'courier')>
                                    <div>
                                        <strong>Courier delivery</strong>
                                        <p>Delivered to your address.</p>
                                    </div>
                                    <span>3.00 €</span>
                                </label>

                                <label class="delivery-option">
                                    <input type="radio" name="delivery_method" value="pickup"
                                           @checked(old('delivery_method', session('checkout.delivery_method')) === 'pickup')>
                                    <div>
                                        <strong>Store pickup</strong>
                                        <p>Pick up your order at our bakery.</p>
                                    </div>
                                    <span>Free</span>
                                </label>
                            </div>
                        </div>

                        <div class="checkout-actions">
                            <a href="{{ route('cart') }}" class="btn-secondary">Back to cart</a>
                            <button type="submit" class="btn-primary">Continue to payment</button>
                        </div>
                    </form>
                </section>
            </main>

            <aside class="checkout-sidebar">
                <section class="sidebar-card">
                    <h2>Order summary</h2>

                    @php
                    $subtotal = 0;
                    @endphp

                    <div class="summary-list">
                        @php
                        $subtotal = 0;
                        @endphp

                        <div class="summary-list">
                            @foreach($cart->products as $product)
                            @php
                            $quantity = (int) $product->pivot->quantity;
                            $lineTotal = $product->price * $quantity;
                            $subtotal += $lineTotal;
                            @endphp

                            <div class="summary-row">
                                <span>{{ $product->name }} × {{ $quantity }}</span>
                                <span>{{ number_format($lineTotal, 2) }} €</span>
                            </div>
                            @endforeach
                        </div>

                        <hr>

                        <div class="summary-total">
                            <span>Total</span>
                            <span>{{ number_format($subtotal, 2) }} €</span>
                        </div>
                    </div>

                    <hr>

                    <div class="summary-total">
                        <span>Total</span>
                        <span>{{ number_format($subtotal, 2) }} €</span>
                    </div>
                </section>
            </aside>
        </div>
    </div>
</x-layout>
