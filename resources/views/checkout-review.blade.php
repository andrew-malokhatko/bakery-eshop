<x-layout>
    <x-slot:title>
        Review order
    </x-slot:title>

    <section class="checkout-review-page">
        <section class="checkout-steps">
            <div class="step-item completed">
                <span class="step-number">1</span>
                <span>Delivery</span>
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
        </section>

        <div class="checkout-review-layout">
            <section class="checkout-review-main">
                <div class="review-card">
                    <h1>Review your order</h1>
                    <p class="review-subtitle">
                        Check your order details before placing it.
                    </p>

                    <div class="review-section">
                        <div class="review-section-head">
                            <h2>Contact information</h2>
                            <a href="{{ route('checkout') }}">Edit</a>
                        </div>

                        <div class="review-info-box">
                            <div class="review-info-row">
                                <span>Email</span>
                                <span>hello@bakery.com</span>
                            </div>
                            <div class="review-info-row">
                                <span>Phone</span>
                                <span>+421 900 123 456</span>
                            </div>
                        </div>
                    </div>

                    <div class="review-section">
                        <div class="review-section-head">
                            <h2>Shipping address</h2>
                            <a href="{{ route('checkout') }}">Edit</a>
                        </div>

                        <div class="review-info-box">
                            <div class="review-info-row">
                                <span>Name</span>
                                <span>Customer name</span>
                            </div>
                            <div class="review-info-row">
                                <span>Address</span>
                                <span>Main Street 12, Bratislava, 811 01, Slovakia</span>
                            </div>
                            <div class="review-info-row">
                                <span>Delivery</span>
                                <span>Standard delivery</span>
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
                                <span>Method</span>
                                <span>Credit / Debit card</span>
                            </div>
                            <div class="review-info-row">
                                <span>Card</span>
                                <span>•••• •••• •••• 4281</span>
                            </div>
                        </div>
                    </div>

                    <div class="review-section">
                        <div class="review-section-head">
                            <h2>Items</h2>
                            <a href="{{ route('cart') }}">Edit</a>
                        </div>

                        <div class="review-products">
                            <article class="review-product">
                                <div class="review-product-image">
                                    <img src="{{ asset('images/chocolate-cake.jpg') }}" alt="Chocolate cake" />
                                </div>
                                <div class="review-product-info">
                                    <h3>Chocolate cake</h3>
                                    <p>Size: medium</p>
                                    <span>Qty: 1</span>
                                </div>
                                <div class="review-product-price">24.99€</div>
                            </article>

                            <article class="review-product">
                                <div class="review-product-image">
                                    <img src="{{ asset('images/cookies-box.jpg') }}" alt="Cookies box" />
                                </div>
                                <div class="review-product-info">
                                    <h3>Cookies box</h3>
                                    <p>Vanilla mix</p>
                                    <span>Qty: 2</span>
                                </div>
                                <div class="review-product-price">38.00€</div>
                            </article>
                        </div>
                    </div>

                    <div class="review-note-box">
                        <label for="order-note">Order note</label>
                        <textarea id="order-note" placeholder="Add a note for your order..."></textarea>
                    </div>

                    <div class="review-actions">
                        <a href="{{ route('checkout.payment') }}" class="btn-secondary">Back</a>
                        <a href="{{ route('order.success') }}" class="btn-primary">Place order</a>
                    </div>
                </div>
            </section>

            <aside class="checkout-review-sidebar">
                <div class="sidebar-card review-summary-card">
                    <h2>Order summary</h2>

                    <div class="summary-list">
                        <div class="summary-row">
                            <span>Chocolate cake × 1</span>
                            <span>24.99€</span>
                        </div>
                        <div class="summary-row">
                            <span>Cookies box × 2</span>
                            <span>38.00€</span>
                        </div>
                    </div>

                    <hr />

                    <div class="summary-meta">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>62.99€</span>
                        </div>
                        <div class="summary-row">
                            <span>Delivery</span>
                            <span>4.90€</span>
                        </div>
                    </div>

                    <div class="summary-total">
                        <span>Total</span>
                        <span>67.89€</span>
                    </div>

                    <p class="summary-note">
                        By placing your order, you agree to our Terms &amp; Conditions.
                    </p>
                </div>
            </aside>
        </div>
    </section>
</x-layout>