<x-layout>
    @php
        $selectedCategories = $selectedCategories ?? [];
        $selectedTags = $selectedTags ?? [];
        $search = $search ?? '';
        $minPrice = $minPrice ?? 0;
        $maxPrice = $maxPrice ?? 0;
        $absoluteMinPrice = $absoluteMinPrice ?? 0;
        $absoluteMaxPrice = $absoluteMaxPrice ?? 0;
        $orderBy = $orderBy ?? '';
    @endphp

    <div class="shop-page">
        <div class="shop-main">
            <form class="search-bar" id="product-search" method="GET" action="{{ route('shop') }}">
                <input type="text" id="search-input" placeholder="Search product..." name="search" value="{{ $search }}" />
                {{-- Apply categories filters  --}}
                @foreach ($selectedCategories as $category)
                    <input type="hidden" name="categories[]" value="{{ $category }}" />
                @endforeach
                {{-- Apply tags filters  --}}
                @foreach ($selectedTags as $tag)
                    <input type="hidden" name="tags[]" value="{{ $tag }}" />
                @endforeach
                {{-- Apply price filters  --}}
                <input type="hidden" name="min_price" value="{{ $minPrice }}" />
                <input type="hidden" name="max_price" value="{{ $maxPrice }}" />
                <input type="hidden" name="order_by" value="{{ $orderBy }}" />
                <button class="search-button" type="submit">Search</button>
            </form>

             <div class="products">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->appends([
                    'search' => $search,
                    'categories' => $selectedCategories,
                    'tags' => $selectedTags,
                    'min_price' => $minPrice,
                    'max_price' => $maxPrice,
                    'order_by' => $orderBy
                ])->links() }}
            </div>
        </div>

        <aside class="shop-sidebar">
            <form method="GET" action="{{ route('shop') }}">
            {{-- Apply search filters  --}}
            <input type="hidden" name="search" value="{{ $search }}" />
            <div class="sorting-panel"> 
                <h3>Price & Order</h3>
                <p class="panel-caption">Set a price range and sorting direction.</p>
                <div class="price-slider-group">
                    <div class="price-values-row">
                        <span>Min: <strong id="min-price-value">{{ number_format($minPrice, 2) }}</strong></span>
                        <span>Max: <strong id="max-price-value">{{ number_format($maxPrice, 2) }}</strong></span>
                    </div>

                    <div class="dual-range" id="price-dual-range">
                        <div class="dual-range-track"></div>
                        <div class="dual-range-fill" id="price-range-fill"></div>

                        <input
                            class="price-range-thumb price-range-thumb-min"
                            id="min-price-range"
                            type="range"
                            name="min_price"
                            min="{{ $absoluteMinPrice }}"
                            max="{{ $absoluteMaxPrice }}"
                            step="0.1"
                            value="{{ $minPrice }}"
                        />

                        <input
                            class="price-range-thumb price-range-thumb-max"
                            id="max-price-range"
                            type="range"
                            name="max_price"
                            min="{{ $absoluteMinPrice }}"
                            max="{{ $absoluteMaxPrice }}"
                            step="0.1"
                            value="{{ $maxPrice }}"
                        />
                    </div>
                </div>

                <label class="sort-label" for="order-by">Order by</label>
                <select class="sort-select" id="order-by" name="order_by">
                    <option value="price_asc" @selected($orderBy === 'price_asc')>Price: low to high</option>
                    <option value="price_desc" @selected($orderBy === 'price_desc')>Price: high to low</option>
                </select>

                <div class="panel-actions">
                    <a class="panel-clear-link" href="{{ route('shop') }}">Reset</a>
                    <button type="submit" class="panel-apply-button">Apply</button>
                </div>
            </div>

            <div class="filters-panel mt-2">
                <h3>Categories</h3>
                <div class="filter-group">
                    @foreach ($categories as $category)
                        <label class="filter-option">
                            <input type="checkbox" name="categories[]" value="{{ $category->name }}" @checked(in_array($category->name, $selectedCategories, true)) />
                            <span>{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="panel-apply-button">Apply</button>
            </div>

            <div class="filters-panel mt-2">
                <h3>Tags</h3>
                <div class="tag-filter-group">
                    @foreach ($tags as $tag)
                        <label class="tag-pill">
                            <input type="checkbox" name="tags[]" value="{{ $tag->name }}" @checked(in_array($tag->name, $selectedTags, true)) />
                            <span>{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="panel-apply-button">Apply</button>
            </div>
            </form>
        </aside>
    </div>

    <script>
        (() => {
            const minRange = document.getElementById('min-price-range');
            const maxRange = document.getElementById('max-price-range');
            const minValue = document.getElementById('min-price-value');
            const maxValue = document.getElementById('max-price-value');
            const fill = document.getElementById('price-range-fill');

            if (!minRange || !maxRange || !minValue || !maxValue || !fill) {
                return;
            }

            const min = Number(minRange.min);
            const max = Number(minRange.max);

            const syncState = () => {
                let currentMin = Number(minRange.value);
                let currentMax = Number(maxRange.value);

                if (currentMin > currentMax) {
                    [currentMin, currentMax] = [currentMax, currentMin];
                    minRange.value = String(currentMin);
                    maxRange.value = String(currentMax);
                }

                minValue.textContent = currentMin.toFixed(2);
                maxValue.textContent = currentMax.toFixed(2);

                const left = ((currentMin - min) / (max - min)) * 100;
                const right = ((currentMax - min) / (max - min)) * 100;

                fill.style.left = `${left}%`;
                fill.style.width = `${right - left}%`;
            };

            minRange.addEventListener('input', syncState);
            maxRange.addEventListener('input', syncState);
            syncState();
        })();
    </script>
</x-layout>