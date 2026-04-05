<x-admin-layout title="Admin edit product">
    <div class="admin-create-product">
        <div class="content">
            <h1 class="name">Edit Product</h1>
            <p class="subtitle">Update product details and save your changes.</p>

            <form class="product-form" action="#" method="post">
                <input type="hidden" name="productId" value="BK-10012">

                <div class="form-grid">
                    <label class="field full-width" for="productName">
                        <span>Product name</span>
                        <input id="productName" name="productName" type="text" value="Strawberry Tart" required>
                    </label>

                    <label class="field" for="category">
                        <span>Category</span>
                        <select id="category" name="category" required>
                            <option value="cakes" selected>Cakes</option>
                            <option value="cookies">Cookies</option>
                            <option value="pastries">Pastries</option>
                            <option value="bread">Bread</option>
                            <option value="other">Other</option>
                        </select>
                    </label>

                    <label class="field" for="sku">
                        <span>SKU</span>
                        <input id="sku" name="sku" type="text" value="BK-10012" required>
                    </label>

                    <label class="field" for="price">
                        <span>Price</span>
                        <input id="price" name="price" type="number" min="0" step="0.01" value="14.90" required>
                    </label>

                    <label class="field" for="stock">
                        <span>Stock</span>
                        <input id="stock" name="stock" type="number" min="0" step="1" value="18" required>
                    </label>

                    <label class="field full-width" for="imageUrl">
                        <span>Image URL</span>
                        <input id="imageUrl" name="imageUrl" type="url" value="https://example.com/strawberry-tart.jpg">
                    </label>

                    <label class="field full-width" for="description">
                        <span>Description</span>
                        <textarea id="description" name="description" rows="5">Delicate vanilla crust filled with smooth cream and fresh strawberries.</textarea>
                    </label>

                    <fieldset class="field full-width status-group">
                        <legend>Status</legend>
                        <label for="statusActive">
                            <input id="statusActive" type="radio" name="status" value="active" checked>
                            Active
                        </label>
                        <label for="statusDraft">
                            <input id="statusDraft" type="radio" name="status" value="draft">
                            Draft
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