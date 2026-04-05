<x-layout>
    <section class="shop-page">
        <div class="shop-main">
            <form class="search-bar" id="product-search">
                <input type="text" id="search-input" placeholder="Search product..." name="search" />
                <button class="search-button" type="submit">Search</button>
            </form>

            <div class="products">
                <x-product-card
                        title="Croissant"
                        price="2.20"
                        img-src="images/croissant.jpg"
                        desc="Buttery, flaky pastry baked fresh every morning." />

                <x-product-card
                        title="Chocolate Roll"
                        price="3.10"
                        img-src="images/chocolate-roll.jpg"
                        desc="Soft sweet roll with rich chocolate filling inside." />

                <x-product-card
                        title="Baguette"
                        price="1.90"
                        img-src="images/baguette.jpg"
                        desc="Classic crispy baguette with a light airy center." />

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

                <x-product-card
                        title="Sourdough Bread"
                        price="3.50"
                        img-src="images/sourdough-bread.jpg"
                        desc="Rustic sourdough loaf with deep flavor and crust." />

                <x-product-card
                        title="Apple Pie"
                        price="4.20"
                        img-src="images/apple-pie.jpg"
                        desc="Golden pie filled with tender spiced apples." />

                <x-product-card
                        title="Donut"
                        price="1.80"
                        img-src="images/donut.jpg"
                        desc="Light fluffy donut with a sweet glazed finish." />
            </div>
        </div>

        <aside class="shop-sidebar">
            <section class="sorting-panel">
                <h3>Sorting</h3>

                <label class="sort-option">
                <input type="radio" name="sort" value="popular" checked />
                <span>Popular</span>
                </label>

                <label class="sort-option">
                <input type="radio" name="sort" value="cheap" />
                <span>Cheap to expensive</span>
                </label>

                <label class="sort-option">
                <input type="radio" name="sort" value="expensive" />
                <span>Expensive to cheap</span>
                </label>

                <button type="button" class="panel-apply-button">Apply</button>
            </section>

            <section class="filters-panel">
                <h3>Filters</h3>

                <div class="filter-group">
                <h4>Product Type</h4>
                <label class="filter-option">
                    <input type="checkbox" name="type" value="Bread" />
                    <span>Bread</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="type" value="Pastries" />
                    <span>Pastries</span>
                </label>
                </div>

                <div class="filter-group">
                <h4>Taste</h4>
                <label class="filter-option">
                    <input type="checkbox" name="taste" value="Sweet" />
                    <span>Sweet</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="taste" value="Savory" />
                    <span>Savory</span>
                </label>
                </div>

                <div class="filter-group">
                <h4>Preparation</h4>
                <label class="filter-option">
                    <input type="checkbox" name="preparation" value="Freshly Baked" />
                    <span>Freshly Baked</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="preparation" value="Gluten-Free" />
                    <span>Gluten-Free</span>
                </label>
                </div>

                <div class="filter-group">
                <h4>Ingredients</h4>
                <label class="filter-option">
                    <input type="checkbox" name="ingredients" value="With Chocolate" />
                    <span>With Chocolate</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="ingredients" value="With Fruit" />
                    <span>With Fruit</span>
                </label>
                </div>

                <button type="button" class="panel-apply-button">Apply</button>
            </section>
        </aside>
    </section>
</x-layout>