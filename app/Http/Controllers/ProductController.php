<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $categories = Category::query()->orderBy('name')->get();

        return view('home', [
            'bestsellerProducts' => $this->getBestsellerProducts(),
            'categories' => $categories,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'categories' => 'nullable|array',
            'categories.*' => 'string|distinct|exists:categories,name',
            'search' => 'nullable|string|max:255',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'order_by' => 'nullable|in:price_asc,price_desc,',
            'tags' => 'nullable|array',
            'tags.*' => 'string|distinct|exists:tags,name',
        ]);

        $selectedCategories = $validated['categories'] ?? [];
        $selectedTags = $validated['tags'] ?? [];
        $searchTerm = $validated['search'] ?? '';
        $orderBy = $validated['order_by'] ?? '';

        $absoluteMinPrice = (float) (Product::query()->where('is_active', true)->min('price') ?? 0);
        $absoluteMaxPrice = (float) (Product::query()->where('is_active', true)->max('price') ?? 0);
        $minPrice = array_key_exists('min_price', $validated) ? (float) $validated['min_price'] : $absoluteMinPrice;
        $maxPrice = array_key_exists('max_price', $validated) ? (float) $validated['max_price'] : $absoluteMaxPrice;

        if ($minPrice > $maxPrice) {
            [$minPrice, $maxPrice] = [$maxPrice, $minPrice];
        }

        $categories = Category::query()->orderBy('name')->get();
        $tags = Tag::query()->orderBy('name')->get();

        $products = Product::query()
            ->where('is_active', true)
            ->with('images')
            ->with('categories')
            // filter by categories
            ->when($selectedCategories !== [], function ($query) use ($selectedCategories): void {
                $query->whereHas('categories', function ($categoryQuery) use ($selectedCategories): void {
                    $categoryQuery->whereIn('name', $selectedCategories);
                });
            })
            // filter by tags
            ->when($selectedTags !== [], function ($query) use ($selectedTags): void {
                $query->whereHas('tags', function ($tagQuery) use ($selectedTags): void {
                    $tagQuery->whereIn('name', $selectedTags);
                });
            })
            // filter by search
            ->when($searchTerm !== '', function ($query) use ($searchTerm): void {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . mb_strtolower($searchTerm) . '%']);
            })
            // filter by price range
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->when($orderBy !== '', function ($query) use ($orderBy) {
                return $query->when($orderBy === 'price_desc', 
                    fn($q) => $q->orderByDesc('price'),
                    fn($q) => $q->orderBy('price')
                );
            })
            ->take(9)
            ->get();

        return view('shop', [
            'products' => $products,
            'search' => $searchTerm,
            'categories' => $categories,
            'tags' => $tags,
            'selectedCategories' => $selectedCategories,
            'selectedTags' => $selectedTags,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'absoluteMinPrice' => $absoluteMinPrice,
            'absoluteMaxPrice' => $absoluteMaxPrice,
            'orderBy' => $orderBy,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['images', 'categories', 'tags']);

        return view('product', [
            'product' => $product,
            'bestsellerProducts' => $this->getBestsellerProducts($product->id),
        ]);
    }

    private function getBestsellerProducts()
    {
        return Product::query()
            ->where('is_active', true)
            ->with('images')
            ->orderByDesc('quantity')
            ->limit(3)
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
