<x-layout>
    <section class="shop-page">
        <div class="shop-main">
            <form class="search-bar" id="product-search">
                <input type="text" id="search-input" placeholder="Search product..." name="search" />
                <button class="search-button" type="submit">Search</button>
            </form>

             <div class="products">
                @foreach ($products as $product)
                    <x-product-card
                        :title="$product->name"
                        :price="$product->price"
                        :img-src="$product->images->first()->url"
                        :desc="$product->description" />
                @endforeach
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