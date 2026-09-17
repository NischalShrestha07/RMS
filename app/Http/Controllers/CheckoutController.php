<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show(CartController $carts)
    {
        $cart = $carts->resolveCart(request());
        $cart->load('items.menuItem');

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty.');
        }

        return view('checkout.show', ['cart' => $cart]);
    }

    public function store(StoreOrderRequest $request, CartController $carts)
    {
        $cart = $carts->resolveCart($request);
        $cart->load('items.menuItem');

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty.');
        }

        $subtotal = $cart->subtotal();
        $coupon = null;
        $discount = 0;

        if ($request->filled('coupon_code')) {
            $coupon = Coupon::where('code', $request->coupon_code)->first();

            if (! $coupon || ! $coupon->isValid()) {
                return redirect()->back()->withErrors(['coupon_code' => 'Invalid or expired coupon code.'])->withInput();
            }

            $discount = $coupon->calculateDiscount($subtotal);
        }

        $order = DB::transaction(function () use ($request, $cart, $subtotal, $coupon, $discount) {
            $order = Order::create([
                'user_id' => $request->user()->id,
                'order_number' => $this->generateOrderNumber(),
                'subtotal' => $subtotal,
                'total' => $subtotal - $discount,
                'status' => 'pending',
                'payment_method' => 'cod',
                'delivery_address' => $request->delivery_address,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'coupon_code' => $coupon?->code,
                'discount' => $discount,
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'menu_item_id' => $item->menu_item_id,
                    'title' => $item->menuItem->title,
                    'price' => $item->menuItem->price,
                    'quantity' => $item->quantity,
                    'line_total' => $item->quantity * $item->menuItem->price,
                ]);
            }

            $cart->items()->delete();

            if ($coupon) {
                $coupon->increment('used_count');
            }

            return $order;
        });

        return redirect()->route('checkout.confirmation', $order)->with('status', 'Order placed!');
    }

    public function confirmation(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);

        return view('checkout.confirmation', ['order' => $order->load('items')]);
    }

    private function generateOrderNumber(): string
    {
        do {
            $number = 'SR-'.strtoupper(Str::random(6));
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }
}
