<x-layout title="Order success - Bakery">
    <div class="order-success-page">
        <section class="order-success-card">
            <h1>Thank you for your order!</h1>

            <p class="order-success-subtitle">
                Your order has been placed successfully. We will prepare your bakery treats as soon as possible.
            </p>

            <div class="order-success-summary">
                <h2>Order summary</h2>

                <div class="order-success-row">
                    <span>Products count</span>
                    <span>{{ $count }}</span>
                </div>

                <div class="order-success-row">
                    <span>Total</span>
                    <span>{{ number_format($total, 2) }} €</span>
                </div>

                <div class="order-success-row">
                    <span>Status</span>
                    <span>Confirmed</span>
                </div>
            </div>

            <div class="order-success-actions">
                <a href="{{ route('shop') }}" class="btn-primary">Continue shopping</a>
                <a href="{{ route('home') }}" class="btn-secondary">Back home</a>
            </div>
        </section>
    </div>
</x-layout>
