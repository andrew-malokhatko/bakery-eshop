<x-layout title="Review order - Bakery">
    <div class="checkout-review-page">
        <div class="checkout-steps">
            <div class="step-item completed">
                <span class="step-number">1</span>
                <span>Details</span>
            </div>
            <div class="step-line"></div>
            <div class="step-item completed">
                <span class="step-number">2</span>
                <span>Payment</span>
            </div>
            <div class="step-line"></div>
            <div class="step-item active">
                <span class="step-number">3</span>
                <span>Review</span>
            </div>
        </div>

        <div class="checkout-review-layout">
            <main class="checkout-review-main">
                <section class="review-card">
                    <h1>Review your order</h1>
                    <p class="review-subtitle">Check your products, delivery information and payment method before placing the order.</p>

                    <div class="review-section">
                        <div class="review-section-head">
                            <h2>Products</h2>
                            <a href="{{ route('cart') }}">Edit cart</a>
                        </div>

                        <div class="review-products">
                            @foreach($cart->products as $product)
                            @php
                            $quantity = (int) $product->pivot->quantity;
                            $lineTotal = $product->price * $quantity;
                            @endphp

                            <div class="review-product">
                                <div class="review-product-image">
                                    <img src="{{ $product->images->first()?->url }}" alt="{{ $product->name }}">
                                </div>

                                <div class="review-product-info">
                                    <h3>{{ $product->name }}</h3>
                                    <p>Quantity: {{ $quantity }}</p>
                                    <span>Unit price: {{ number_format($product->price, 2) }} €</span>
                                </div>

                                <div class="review-product-price">
                                    {{ number_format($lineTotal, 2) }} €
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="review-section">
                        <div class="review-section-head">
                            <h2>Delivery information</h2>
                            <a href="{{ route('checkout') }}">Edit</a>
                        </div>

                        <div class="review-info-box">
                            <div class="review-info-row">
                                <span>Name</span>
                                <span>{{ $checkout['first_name'] }} {{ $checkout['last_name'] }}</span>
                            </div>

                            <div class="review-info-row">
                                <span>Email</span>
                                <span>{{ $checkout['email'] }}</span>
                            </div>

                            <div class="review-info-row">
                                <span>Phone</span>
                                <span>{{ $checkout['phone'] }}</span>
                            </div>

                            <div class="review-info-row">
                                <span>Address</span>
                                <span>{{ $checkout['street'] }}, {{ $checkout['city'] }}, {{ $checkout['zip'] }}</span>
                            </div>

                            <div class="review-info-row">
                                <span>Delivery method</span>
                                <span>{{ ucfirst($checkout['delivery_method']) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="review-section">
                        <div class="review-section-head">
                            <h2>Payment</h2>
                            <a href="{{ route('checkout.payment') }}">Edit</a>
                        </div>

                        <div class="review-info-box">
                            <div class="review-info-row">
                                <span>Payment method</span>
                                <span>{{ ucfirst($payment['payment_method']) }}</span>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('checkout.complete') }}">
                        @csrf

                        <div class="review-actions">
                            <a href="{{ route('checkout.payment') }}" class="btn-secondary">Back</a>
                            <button type="submit" class="btn-primary">Place order</button>
                        </div>
                    </form>
                </section>
            </main>

            <aside class="checkout-review-sidebar">
                <section class="review-summary-card">
                    <h2>Summary</h2>

                    @php
                    $subtotal = 0;
                    @endphp

                    @foreach($cart->products as $product)
                    @php
                    $subtotal += $product->price * (int) $product->pivot->quantity;
                    @endphp
                    @endforeach

                    <div class="summary-row">
                        <span>Products</span>
                        <span>{{ number_format($subtotal, 2) }} €</span>
                    </div>

                    <div class="summary-row">
                        <span>Delivery</span>
                        <span>{{ ($checkout['delivery_method'] ?? '') === 'courier' ? '3.00 €' : 'Free' }}</span>
                    </div>

                    @php
                    $deliveryPrice = ($checkout['delivery_method'] ?? '') === 'courier' ? 3 : 0;
                    $total = $subtotal + $deliveryPrice;
                    @endphp

                    <hr>

                    <div class="summary-total">
                        <span>Total</span>
                        <span>{{ number_format($total, 2) }} €</span>
                    </div>

                    <p class="summary-note">Your order will be prepared after confirmation.</p>
                </section>
            </aside>
        </div>
    </div>
</x-layout>
