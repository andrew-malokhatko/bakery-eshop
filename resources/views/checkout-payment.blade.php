<x-layout title="Payment - Bakery">
    <div class="checkout-page">
        <div class="checkout-steps">
            <div class="step-item completed">
                <span class="step-number">1</span>
                <span>Details</span>
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
        </div>

        <div class="checkout-layout">
            <main class="checkout-main">
                <section class="checkout-card">
                    <h1>Payment</h1>
                    <p class="checkout-subtitle">Choose how you would like to pay.</p>

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

                    <form class="checkout-form" method="POST" action="{{ route('checkout.payment.save') }}">
                        @csrf

                        <div class="form-block">
                            <h2>Payment method</h2>

                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="card"
                                           @checked(old('payment_method', session('payment.payment_method', 'card')) === 'card')>
                                    <span>Card payment</span>
                                </label>

                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="cash"
                                           @checked(old('payment_method', session('payment.payment_method')) === 'cash')>
                                    <span>Cash on delivery / pickup</span>
                                </label>
                            </div>
                        </div>

                        <div class="checkout-actions">
                            <a href="{{ route('checkout') }}" class="btn-secondary">Back</a>
                            <button type="submit" class="btn-primary">Continue to review</button>
                        </div>
                    </form>
                </section>
            </main>

            <aside class="checkout-sidebar">
                <section class="sidebar-card">
                    <h2>Delivery details</h2>

                    @php
                    $checkout = session('checkout');
                    @endphp

                    <div class="summary-meta">
                        <div class="summary-row">
                            <span>Name</span>
                            <span>{{ $checkout['first_name'] ?? '' }} {{ $checkout['last_name'] ?? '' }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Email</span>
                            <span>{{ $checkout['email'] ?? '' }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Delivery</span>
                            <span>{{ ucfirst($checkout['delivery_method'] ?? '') }}</span>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </div>
</x-layout>
