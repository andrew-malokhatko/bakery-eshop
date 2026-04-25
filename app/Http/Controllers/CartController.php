<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function post(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);

        $quantity = Number::clamp($validated['quantity'], 1, 20);
        $cart = $this->getOrCreateCurrentCart();

        $this->addProductToCartModel($cart, $product, $quantity);

        return redirect()->route('cart');
    }

    public function index()
    {
        return view('cart', [
            'cart' => $this->findCurrentCart(),
        ]);
    }

    public function remove(int $product_id)
    {
        $cart = $this->findCurrentCart();

        if ($cart !== null) {
            $cart->products()->detach($product_id);
        }

        return redirect()->route('cart');
    }

    public function claimSessionCartForUser(User $user): void
    {
        $sessionId = $this->currentSessionId();
        $guestCart = Cart::query()
            ->where('session_id', $sessionId)
            ->first();

        if ($guestCart === null) {
            Log::debug('No guest cart to claim for user ' . $user->id);
            return;
        }

        $userCart = Cart::query()->where('user_id', $user->id)->first();
        if ($userCart !== null) {
            $userCart->delete();
        }

        Log::debug('Claiming cart for user ' . $user->id);
        $guestCart->update([
            'user_id' => $user->id,
            'session_id' => null,
        ]);
    }

    private function findCurrentCart(): ?Cart
    {
        if (Auth::check()) {
            return Cart::query()
                ->with('products.images')
                ->where('user_id', Auth::id())
                ->first();
        }

        return Cart::query()
            ->with('products.images')
            ->where('session_id', $this->currentSessionId())
            ->first();
    }

    private function getOrCreateCurrentCart(): Cart
    {
        if (Auth::check()) {
            return Cart::query()->firstOrCreate(
                ['user_id' => Auth::id()],
                ['session_id' => null]
            );
        }

        return Cart::query()->firstOrCreate(
            ['session_id' => $this->currentSessionId()],
            ['user_id' => null]
        );
    }

    private function addProductToCartModel(Cart $cart, Product $product, int $quantity): void
    {
        $existingQuantity = (int) ($cart->products()
            ->whereKey($product->id)
            ->first()?->pivot->quantity ?? 0);

        $cart->products()->syncWithoutDetaching([
            $product->id => [
                'quantity' => min(20, $existingQuantity + $quantity),
            ],
        ]);
    }

    private function currentSessionId(): string
    {
        if (!session()->has('guest_cart_token')) {
            session([
                'guest_cart_token' => Str::uuid()->toString()
            ]);
        }

        return session('guest_cart_token');
    }
}
