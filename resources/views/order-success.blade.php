<x-layout>
    <x-slot:title>
        Order success
    </x-slot:title>

    <section class="order-success-page">
        <section class="order-success-card">
            <h1>Your order is on the way!</h1>
            <p class="order-success-subtitle">
                Thank you for your order. We’ve received it successfully and we’re already preparing your bakery treats.
            </p>

            <div class="order-success-summary">
                <h2>Order review</h2>

                <div class="order-success-row">
                    <span>Order number</span>
                    <span>#BK-2026-031</span>
                </div>

                <div class="order-success-row">
                    <span>Status</span>
                    <span>Confirmed</span>
                </div>

                <div class="order-success-row">
                    <span>Delivery</span>
                    <span>Standard delivery</span>
                </div>

                <div class="order-success-row">
                    <span>Estimated arrival</span>
                    <span>2–4 business days</span>
                </div>

                <div class="order-success-row">
                    <span>Total</span>
                    <span>67.89€</span>
                </div>
            </div>

            <div class="order-success-actions">
                <a href="{{ route('profile') }}" class="btn-secondary">Your profile</a>
                <a href="{{ route('shop') }}" class="btn-primary">Go to shop</a>
            </div>
        </section>
    </section>
</x-layout>