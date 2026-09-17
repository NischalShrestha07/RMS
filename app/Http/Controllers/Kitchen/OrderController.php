<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Order;

class OrderController extends Controller
{
    private const NEXT_STATUS = [
        'pending' => 'confirmed',
        'confirmed' => 'preparing',
        'preparing' => 'ready',
    ];

    public function advance(Order $order)
    {
        abort_unless(isset(self::NEXT_STATUS[$order->status]), 422, 'This order cannot be advanced from the kitchen.');

        $order->update(['status' => self::NEXT_STATUS[$order->status]]);

        ActivityLog::record('order.advanced', $order, "Order {$order->order_number} advanced to {$order->status} (kitchen)");

        return back()->with('status', "Order {$order->order_number} moved to {$order->status}.");
    }
}
