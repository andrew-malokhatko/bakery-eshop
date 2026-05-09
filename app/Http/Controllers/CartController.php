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

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);

        $cart = $this->findCurrentCart();
        if ($cart !== null) {
            $cart->products()->updateExistingPivot(
                $product->id,
                ['quantity' => Number::clamp($validated['quantity'], 1, 20)]
            );
        }

        return back();
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

    public function checkout()
    {
        $cart = $this->findCurrentCart();

        if ($cart === null || $cart->products->isEmpty()) {
            return redirect()->route('cart');
        }

        return view('checkout', [
            'cart' => $cart,
        ]);
    }

    public function saveCheckout(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'delivery_method' => 'required|in:courier,pickup',
        ]);

        session()->put('checkout', $validated);

        return redirect()->route('checkout.payment');
    }

    public function payment()
    {
        $cart = $this->findCurrentCart();

        if ($cart === null || $cart->products->isEmpty()) {
            return redirect()->route('cart');
        }

        if (!session()->has('checkout')) {
            return redirect()->route('checkout');
        }

        return view('checkout-payment', [
            'cart' => $cart,
        ]);
    }

    public function savePayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:card,cash,bank_transfer',
        ]);

        session()->put('payment', $validated);

        return redirect()->route('checkout.review');
    }

    public function review()
    {
        $cart = $this->findCurrentCart();
        $checkout = session()->get('checkout');
        $payment = session()->get('payment');

        if ($cart === null || $cart->products->isEmpty()) {
            return redirect()->route('cart');
        }

        if (!$checkout) {
            return redirect()->route('checkout');
        }

        if (!$payment) {
            return redirect()->route('checkout.payment');
        }

        return view('checkout-review', [
            'cart' => $cart,
            'checkout' => $checkout,
            'payment' => $payment,
        ]);
    }

    public function completeOrder()
    {
        $cart = $this->findCurrentCart();

        if ($cart === null || $cart->products->isEmpty()) {
            return redirect()->route('cart');
        }

        $subtotal = $cart->products->sum(function ($product) {
            return $product->price * (int) $product->pivot->quantity;
        });

        $checkout = session()->get('checkout', []);
        $deliveryPrice = ($checkout['delivery_method'] ?? null) === 'courier' ? 3 : 0;
        $total = $subtotal + $deliveryPrice;

        session()->put('last_order_total', $total);
        session()->put('last_order_count', $cart->products->sum(fn ($product) => (int) $product->pivot->quantity));

        $cart->products()->detach();

        session()->forget('checkout');
        session()->forget('payment');

        return redirect()->route('order.success');
    }

    public function success()
    {
        return view('order-success', [
            'total' => session()->get('last_order_total', 0),
            'count' => session()->get('last_order_count', 0),
        ]);
    }
}
