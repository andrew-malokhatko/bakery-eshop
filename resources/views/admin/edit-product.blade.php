<x-admin-layout title="Admin edit product">
    <div class="admin-create-product">
        <div class="content">
            <h1 class="name">Edit Product</h1>
            <p class="subtitle">Update product details and save your changes.</p>

            @if ($errors->any())
            <div class="form-errors">
                <strong>Please fix the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div id="client-errors" class="form-errors" style="display: none;">
                <strong>Please fix the following errors:</strong>
                <ul id="client-errors-list"></ul>
            </div>

            @if ($errors->any())
            <div class="form-errors">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="product-form" class="product-form" action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
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

                        @php
                            $selectedTagIds = old('tags', $product->tags->pluck('id')->toArray());
                        @endphp

                        <div class="tags-wrap">
                            <div>
                                <p style="margin: 0 0 10px; font-weight: 600;">Occasion</p>
                                <div class="tags-wrap">
                                    @foreach($occasionTags as $tag)
                                    <label class="tag-pill">
                                        <input
                                            type="checkbox"
                                            name="tags[]"
                                            value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $selectedTagIds) ? 'checked' : '' }}
                                        >
                                        <span>{{ $tag->name }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <div style="margin-top: 16px;">
                                <p style="margin: 0 0 10px; font-weight: 600;">Texture</p>
                                <div class="tags-wrap">
                                    @foreach($textureTags as $tag)
                                    <label class="tag-pill">
                                        <input
                                            type="checkbox"
                                            name="tags[]"
                                            value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $selectedTagIds) ? 'checked' : '' }}
                                        >
                                        <span>{{ $tag->name }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('product-form');
            const imagesInput = document.getElementById('images');
            const errorBox = document.getElementById('client-errors');
            const errorList = document.getElementById('client-errors-list');

            if (!form || !imagesInput || !errorBox || !errorList) {
                return;
            }

            form.addEventListener('submit', function (event) {
                const errors = [];
                const files = Array.from(imagesInput.files);

                const isEditPage = window.location.pathname.includes('/edit');
                const maxFileSize = 2 * 1024 * 1024; // 2 MB
                const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

                if (!isEditPage && files.length < 2) {
                    errors.push('Please upload at least 2 product images.');
                }

                if (isEditPage && files.length > 0 && files.length < 2) {
                    errors.push('Please upload at least 2 images if you want to replace the current images.');
                }

                files.forEach(function (file) {
                    if (!allowedTypes.includes(file.type)) {
                        errors.push(file.name + ' must be JPG, PNG, or WEBP.');
                    }

                    if (file.size > maxFileSize) {
                        errors.push(file.name + ' is too large. Each image must be smaller than 2 MB.');
                    }
                });

                if (errors.length > 0) {
                    event.preventDefault();

                    errorList.innerHTML = '';

                    errors.forEach(function (error) {
                        const li = document.createElement('li');
                        li.textContent = error;
                        errorList.appendChild(li);
                    });

                    errorBox.style.display = 'block';
                    errorBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        });
    </script>
</x-admin-layout>
