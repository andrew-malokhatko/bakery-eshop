<x-admin-layout title="Admin edit product">
    <div class="admin-create-product">
        <div class="content">
            <h1 class="name">Edit Product</h1>
            <p class="subtitle">Update product details and save your changes.</p>

            @if ($errors->any())
            <div style="margin-bottom: 20px; padding: 12px 16px; border: 1px solid #f5c2c7; background: #f8d7da; color: #842029; border-radius: 8px;">
                <strong>Form errors:</strong>
                <ul style="margin: 8px 0 0 18px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="product-form" action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
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

                    @if($product->images->isNotEmpty())
                    <div class="field full-width">
                        <span>Current images</span>
                        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
                            @foreach($product->images as $image)
                            <img src="{{ $image->url }}" alt="{{ $image->alt_text }}" style="width:120px; height:120px; object-fit:cover; border-radius:10px;">
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <label class="field full-width" for="images">
                        <span>Replace product images</span>
                        <input id="images" name="images[]" type="file" multiple accept="image/*">
                        <small>Upload 2 or more new images if you want to replace the old ones</small>
                    </label>

                    <div class="field full-width">
                        <span>Tags</span>

                        <div class="tags-wrap">
                            @foreach($tags as $tag)
                            <label class="tag-pill">
                                <input
                                    type="checkbox"
                                    name="tags[]"
                                    value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', $product->tags->pluck('id')->toArray())) ? 'checked' : '' }}
                                >
                                <span>{{ $tag->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

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
