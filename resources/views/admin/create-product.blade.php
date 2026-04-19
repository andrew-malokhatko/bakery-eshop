<x-admin-layout title="Admin create product">
    <div class="admin-create-product">
        <div class="content">
            <h1 class="name">Create Product</h1>
            <p class="subtitle">Add a new item to your bakery catalog.</p>

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

            <form class="product-form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <label class="field full-width" for="name">
                        <span>Product name</span>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required>
                    </label>

                    <label class="field" for="category_id">
                        <span>Category</span>
                        <select id="category_id" name="category_id" required>
                            <option value="" disabled selected>Select category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </label>

                    <label class="field" for="price">
                        <span>Price</span>
                        <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price') }}" required>
                    </label>

                    <label class="field" for="quantity">
                        <span>Stock</span>
                        <input id="quantity" name="quantity" type="number" min="0" step="1" value="{{ old('quantity') }}" required>
                    </label>

                    <label class="field full-width" for="images">
                        <span>Product images</span>
                        <input id="images" name="images[]" type="file" multiple accept="image/*" required>
                        <small>Choose at least 2 images</small>
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
                                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                >
                                <span>{{ $tag->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <label class="field full-width" for="description">
                        <span>Description</span>
                        <textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>
                    </label>

                    <fieldset class="field full-width status-group">
                        <legend>Status</legend>

                        <label for="statusActive">
                            <input id="statusActive" type="radio" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                            Active
                        </label>

                        <label for="statusDraft">
                            <input id="statusDraft" type="radio" name="is_active" value="0" {{ old('is_active') == '0' ? 'checked' : '' }}>
                            Inactive
                        </label>
                    </fieldset>
                </div>

                <div class="actions">
                    <a class="cancel" href="{{ route('admin.products.index') }}">Cancel</a>
                    <button class="create" type="submit">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
