<x-layout>
    <section class="product">
        <img src="{{ asset('images/chocolate-roll.jpg') }}"/>
        <div class="content">
            <h1 class="price">Chocolate Cake</h1>
            <p class="desc">A soft chocolate sponge layered with light cream and finished with fresh berries. This cake is rich, elegant, and perfect for celebrations or a sweet afternoon treat.</p>
            <hr />
            <p class="price">22,00 €</p>
            <div class="actions">
                <x-quantity-input min="1" max="20" value="1"></x-quantity-input>
                <button>Add to cart</button>
            </div>

        </div>
    </section>

    <section class="product-info">
        <div class="desc">
            <h2>Description</h2>
            <p>Our Chocolate Berry Cake combines deep cocoa flavor with a smooth creamy filling and a delicate berry finish. The texture is soft and moist, while the fresh fruit adds a light and refreshing balance. It is a beautiful choice for birthdays, special occasions, or simply enjoying something sweet and carefully made.</p>
        </div>
        <div class="ingredients">
            <h2>Ingredients</h2>
            <ul>
                <li>Flour</li>
                <li>Cocoa powder</li>
                <li>Eggs</li>
                <li>Cream and fresh berries</li>
            </ul>
        </div>
        <div class="allergens">
            <h2>Allergens</h2>
            <ul>
                <li>Gluten</li>
                <li>Milk</li>
                <li>Eggs</li>
                <li>May contain nuts</li>
            </ul>
        </div>
    </section>

    <section class="bestsellers">
        <h2 class="title">We also recommend you try: </h2>
        <div class="products">
            <x-product-card
                    title="Croissant"
                    price="2.20"
                    img-src="images/croissant.jpg"
                    desc="Buttery, flaky pastry baked fresh every morning." />
            <x-product-card
                    title="Blueberry Muffin"
                    price="2.80"
                    img-src="images/blueberrie-muffin.jpg"
                    desc="Tender muffin filled with juicy blueberries." />
            <x-product-card
                    title="Cinnamon Bun"
                    price="2.60"
                    img-src="images/cinnamon-bun.jpg"
                    desc="Soft bun swirled with cinnamon and sugar." />
        </div>
    </section>
</x-layout>