<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Number;

class CartController extends Controller
{
    public function post(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);

        $cart = session()->get('cart', []);
        $quantity = Number::clamp($validated['quantity'], 1, 20);
        $existingQuantity = $cart[$product->id]['quantity'] ?? 0;

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $existingQuantity + $quantity,
            'image' => $product->images()->first()->url,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function index()
    {
        // $cart = collect(session()->get('cart', []))
        //     ->map(function (array $product, int $productId) {
        //         $product['id'] = $product['id'] ?? $productId;

        //         return $product;
        //     })
        //     ->all();

        // session()->put('cart', $cart);

        return view('cart', ['cart' => session()->get('cart', [])]);
    }

    public function remove(Request $request, int $product_id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }
}
