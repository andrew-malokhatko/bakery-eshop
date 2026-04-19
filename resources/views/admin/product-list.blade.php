<x-admin-layout title="Admin product list">
    <div class="admin-product-list">
        <div class="list-header">
            <div>
                <h1 class="name">Product Catalog</h1>
                <p class="subtitle">All products currently available in the shop.</p>
            </div>
            <a class="add-product" href="{{ route('admin.products.create') }}">+ Add Product</a>
        </div>

        <section class="list-panel">
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>SKU</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->images->first())
                            <img src="{{ $product->images->first()->url }}" alt="{{ $product->name }}" width="70">
                            @endif
                        </td>

                        <td>
                            <p class="product-name">{{ $product->name }}</p>
                            <p class="product-info">{{ $product->description }}</p>
                        </td>

                        <td>{{ $product->categories->first()?->name ?? '-' }}</td>
                        <td>{{ number_format($product->price, 2) }} EUR</td>
                        <td>{{ $product->quantity }}</td>
                        <td>#{{ $product->id }}</td>
                        <td>
                            @foreach($product->tags as $tag)
                            <span>{{ $tag->name }}</span>
                            @endforeach
                        </td>

                        <td>
                            @if($product->is_active)
                            <span class="status active">Active</span>
                            @else
                            <span class="status draft">Inactive</span>
                            @endif
                        </td>

                        <td class="actions">
                            <a href="{{ route('admin.products.edit', $product) }}">Edit</a>

                            <form action="{{ route('admin.products.delete', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-admin-layout>
