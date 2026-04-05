<x-layout>
    <section class="contact">
        <h1>Let’s talk</h1>
        <p>Have a question about an order, delivery, or custom cake? Send us a message and we’ll get back to you soon.</p>

        <input type="fullname" class="fullname" placeholder="Full name">
        <input type="email" class="email" placeholder="Email address">
        <input type="email_mes" class="email_mes" placeholder="Your message">

        <div class="service-group">
            <span>Service you're interested in:</span>
            <label class="service-option">
                <input type="checkbox" name="service" value="orders" />
                Orders
            </label>
            <label class="service-option">
                <input type="checkbox" name="service" value="delivery" />
                Delivery
            </label>
            <label class="service-option">
                <input type="checkbox" name="service" value="custom" />
                Custom cakes
            </label>
        </div>

        <div class="form-actions">
            <button class="submit" type="submit">Send</button>
        </div>
    </section>

    <aside class="contact-info-card">
        <div class="contact-info">
            <a class="contact-chip address" href="#">Main Street 12<br>Bratislava, Slovakia</a>
            <a class="contact-chip" href="mailto:hello@bakery.com">hello@bakery.com</a>
            <a class="contact-chip" href="tel:+421900123456">+421 900 123 456</a>
        </div>
    </aside>
</x-layout>