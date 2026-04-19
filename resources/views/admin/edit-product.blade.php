<x-admin-layout title="Admin edit product">
    <div class="admin-create-product">
        <div class="content">
            <h1 class="name">Edit Product</h1>
            <p class="subtitle">Update product details and save your changes.</p>

            <form class="product-form" action="{{ route('admin.products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <label class="field full-width" for="name">
                        <span>Product name</span>
                        <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" required>
                    </label>

                    <label class="field" for="category_id">
                        <span>Category</span>
                        <select id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->categories->first()?->id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </label>

                    <label class="field" for="price">
                        <span>Price</span>
                        <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $product->price) }}" required>
                    </label>

                    <label class="field" for="quantity">
                        <span>Stock</span>
                        <input id="quantity" name="quantity" type="number" min="0" step="1" value="{{ old('quantity', $product->quantity) }}" required>
                    </label>

                    <label class="field full-width" for="image_url_1">
                        <span>Image URL 1</span>
                        <input id="image_url_1" name="image_url_1" type="url" value="{{ old('image_url_1', $product->images[0]->url ?? '') }}" required>
                    </label>

                    <label class="field full-width" for="image_url_2">
                        <span>Image URL 2</span>
                        <input id="image_url_2" name="image_url_2" type="url" value="{{ old('image_url_2', $product->images[1]->url ?? '') }}" required>
                    </label>

                    <label class="field full-width" for="description">
                        <span>Description</span>
                        <textarea id="description" name="description" rows="5">{{ old('description', $product->description) }}</textarea>
                    </label>

                    <fieldset class="field full-width status-group">
                        <legend>Status</legend>

                        <label for="statusActive">
                            <input id="statusActive" type="radio" name="is_active" value="1"
                                   {{ old('is_active', $product->is_active) == 1 ? 'checked' : '' }}>
                            Active
                        </label>

                        <label for="statusDraft">
                            <input id="statusDraft" type="radio" name="is_active" value="0"
                                   {{ old('is_active', $product->is_active) == 0 ? 'checked' : '' }}>
                            Inactive
                        </label>
                    </fieldset>
                </div>

                <div class="actions">
                    <a class="cancel" href="{{ route('admin.products.index') }}">Cancel</a>
                    <button class="create" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
