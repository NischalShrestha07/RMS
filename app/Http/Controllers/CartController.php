<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public const GUEST_COOKIE = 'cart_token';

    private function guestToken(Request $request): string
    {
        $token = $request->cookie(self::GUEST_COOKIE);

        if (! $token) {
            $token = (string) Str::uuid();
            Cookie::queue(self::GUEST_COOKIE, $token, 60 * 24 * 365);
        }

        return $token;
    }

    public function index(Request $request)
    {
        $cart = $this->resolveCart($request);
        $cart->load('items.menuItem.category');

        return view('cart.index', ['cart' => $cart]);
    }

    public function store(AddCartItemRequest $request)
    {
        $cart = $this->resolveCart($request);

        $item = $cart->items()->where('menu_item_id', $request->menu_item_id)->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            $item = $cart->items()->create([
                'menu_item_id' => $request->menu_item_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json([
            'message' => 'Added to cart',
            'cart_count' => $cart->items()->sum('quantity'),
        ]);
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $this->authorizeCartItem($request, $cartItem);

        $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:20']]);

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Updated', 'cart_count' => $cartItem->cart->items()->sum('quantity')]);
    }

    public function destroy(Request $request, CartItem $cartItem)
    {
        $this->authorizeCartItem($request, $cartItem);

        $cart = $cartItem->cart;
        $cartItem->delete();

        return response()->json(['message' => 'Removed', 'cart_count' => $cart->items()->sum('quantity')]);
    }

    private function authorizeCartItem(Request $request, CartItem $cartItem): void
    {
        abort_unless($cartItem->cart_id === $this->resolveCart($request)->id, 403);
    }

    public function cartCount(Request $request): int
    {
        $cart = $request->user()
            ? Cart::where('user_id', $request->user()->id)->first()
            : Cart::where('session_id', $request->cookie(self::GUEST_COOKIE))->first();

        return $cart?->items()->sum('quantity') ?? 0;
    }

    public function resolveCart(Request $request): Cart
    {
        if ($request->user()) {
            return Cart::firstOrCreate(['user_id' => $request->user()->id]);
        }

        return Cart::firstOrCreate(['session_id' => $this->guestToken($request)]);
    }
}
