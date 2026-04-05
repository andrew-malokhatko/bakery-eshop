<x-layout>
    <section class="hero">
		<img src="{{ asset('images/logo.png') }}" alt="Hero Image">
        <div class="text">
            <h1 class="title">Sweet moments start here</h1>
            <p class="desc">Discover handmade desserts, fresh pastries, and custom cakes created
                to make every day feel a little more special.</p>
            <div class="buttons">
                <a href="{{ route('shop') }}" class="primary">Order <span aria-hidden="true">&rarr;</span></a>
                <a href="{{ route('contact') }}" class="secondary">Learn more</a>
            </div>
        </div>
	</section>

    <div class="bestsellers">
        <h2 class="title">Bestsellers</h2>
        <div class="products">
            {{-- <x-product-cart href="product" img-src="images/chocolate-cake.jpg"/> --}}
            <x-product-card
                    href="{{ route('product') }}"
                    img-src="images/chocolate-cake.jpg"
                    title="Chocolate cake"
                    desc="Rich chocolate sponge with soft cream and berries."
                    price="24.99" />

            <x-product-card
                    href="{{ route('product') }}"
                    img-src="images/vanilla-cupcake.jpg"
                    title="Vanilla cupcakes"
                    desc="Light vanilla cupcakes with creamy frosting."
                    price="12.50" />

            <x-product-card
                    href="{{ route('product') }}"
                    img-src="images/cookies-box.jpg"
                    title="Cookies box"
                    desc="A mix of handmade cookies for tea or coffee."
                    price="9.90" />
		</div>
	</div>

    <article class="review" id="review">
        <div class="content">
            <h2 class="title">Made with love in every layer</h2>
                <p class="text">Our bakery is a small place where every dessert is prepared with attention
                    to detail, fresh ingredients, and a passion for creating something special.
                    From everyday treats to celebration cakes, we want each order to feel warm,
                    personal, and made just for you.</p>
        </div>
        <img src="{{ asset('images/bakery-shop.jpg') }}"/>
    </article>

    <div class="categories">
        <h2 class="title">Categories</h2>
        <div class="content">
            <x-category-card name="Bread" imgSrc="https://placehold.co/600x400/fdf2f8/7e22ce?text=Bread" />
            <x-category-card name="Cakes" imgSrc="https://placehold.co/600x400/fdf2f8/7e22ce?text=Cakes" />
            <x-category-card name="Pastries" imgSrc="https://placehold.co/600x400/fdf2f8/7e22ce?text=Pastries" />
            <x-category-card name="Cookies" imgSrc="https://placehold.co/600x400/fdf2f8/7e22ce?text=Cookies" />
        </div>
    </div>
</x-layout>