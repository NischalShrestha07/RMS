<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function assign(Request $request, Order $order)
    {
        abort_unless($order->status === 'ready', 422, 'Order is not ready for delivery.');
        abort_if($order->delivery, 422, 'Order already assigned to a rider.');

        Delivery::create([
            'order_id' => $order->id,
            'rider_id' => $request->user()->id,
            'assigned_at' => now(),
        ]);

        return back()->with('status', "Order {$order->order_number} assigned to you.");
    }

    public function pickup(Request $request, Order $order)
    {
        $delivery = $this->authorizedDelivery($request, $order);

        $delivery->update(['picked_up_at' => now()]);
        $order->update(['status' => 'out_for_delivery']);

        return back()->with('status', "Order {$order->order_number} marked out for delivery.");
    }

    public function deliver(Request $request, Order $order)
    {
        $delivery = $this->authorizedDelivery($request, $order);

        $delivery->update(['delivered_at' => now()]);
        $order->update(['status' => 'delivered']);

        return back()->with('status', "Order {$order->order_number} marked delivered.");
    }

    private function authorizedDelivery(Request $request, Order $order): Delivery
    {
        $delivery = $order->delivery;

        abort_unless($delivery && $delivery->rider_id === $request->user()->id, 403);

        return $delivery;
    }
}
