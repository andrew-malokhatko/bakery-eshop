<x-layout>
    <x-slot:title>
        Payment
    </x-slot:title>

    <section class="checkout-page">
        <section class="checkout-steps">
            <div class="step-item completed">
                <span class="step-number">1</span>
                <span>Delivery</span>
            </div>
            <div class="step-line"></div>
            <div class="step-item active">
                <span class="step-number">2</span>
                <span>Payment</span>
            </div>
            <div class="step-line"></div>
            <div class="step-item">
                <span class="step-number">3</span>
                <span>Review</span>
            </div>
        </section>

        <div class="checkout-layout">
            <section class="checkout-main">
                <div class="checkout-card">
                    <h1>Payment</h1>
                    <p class="checkout-subtitle">Choose a payment method and review your order.</p>

                    <form class="checkout-form">
                        <div class="form-block">
                            <h2>Payment method</h2>

                            <div class="payment-options">
                                <label class="payment-option active">
                                    <input type="radio" name="payment" checked>
                                    <span>Credit / Debit card</span>
                                </label>

                                <label class="payment-option">
                                    <input type="radio" name="payment">
                                    <span>Cash on delivery</span>
                                </label>

                                <label class="payment-option">
                                    <input type="radio" name="payment">
                                    <span>Bank transfer</span>
                                </label>
                            </div>

                            <div class="form-grid">
                                <input class="full" type="text" placeholder="Cardholder name">
                                <input class="full" type="text" placeholder="Card number">
                                <input type="text" placeholder="MM / YY">
                                <input type="text" placeholder="CVV">
                            </div>
                        </div>

                        <div class="form-block">
                            <h2>Billing address</h2>
                            <label class="checkbox-line">
                                <input type="checkbox" checked>
                                <span>Same as shipping address</span>
                            </label>
                        </div>

                        <div class="form-block">
                            <h2>Review</h2>
                            <div class="review-box">
                                <div class="review-row">
                                    <span>Contact</span>
                                    <span>hello@email.com</span>
                                </div>
                                <div class="review-row">
                                    <span>Address</span>
                                    <span>Main Street 12, Bratislava</span>
                                </div>
                                <div class="review-row">
                                    <span>Delivery</span>
                                    <span>Standard delivery</span>
                                </div>
                                <div class="review-row">
                                    <span>Payment</span>
                                    <span>Credit / Debit card</span>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-actions">
                            <a href="{{ route('checkout') }}" class="btn-secondary">Back</a>
                            <a href="{{ route('checkout.review') }}" class="btn-primary">Review order</a>
                        </div>
                    </form>
                </div>
            </section>

            <aside class="checkout-sidebar">
                <div class="sidebar-card">
                    <h2>Order summary</h2>

                    <div class="summary-list">
                        <div class="summary-row">
                            <span>Chocolate cake × 1</span>
                            <span>24.99€</span>
                        </div>
                        <div class="summary-row">
                            <span>Cupcakes set × 2</span>
                            <span>38.00€</span>
                        </div>
                        <div class="summary-row">
                            <span>Cookies box × 1</span>
                            <span>12.50€</span>
                        </div>
                    </div>

                    <hr>

                    <div class="summary-meta">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>75.49€</span>
                        </div>
                        <div class="summary-row">
                            <span>Delivery</span>
                            <span>4.90€</span>
                        </div>
                    </div>

                    <div class="summary-total">
                        <span>Total</span>
                        <span>80.39€</span>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</x-layout>