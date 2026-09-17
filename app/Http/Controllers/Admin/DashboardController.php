<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $todayOrders = Order::whereDate('created_at', today())->get();

        $trendOrders = Order::where('status', '!=', 'cancelled')
            ->whereDate('created_at', '>=', now()->subDays(13)->startOfDay())
            ->get()
            ->groupBy(fn ($order) => $order->created_at->format('Y-m-d'));

        $revenueTrend = [];
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dayOrders = $trendOrders->get($date->format('Y-m-d'), collect());
            $revenueTrend[] = [
                'date' => $date->format('M d'),
                'revenue' => (float) $dayOrders->sum('total'),
                'orders' => $dayOrders->count(),
            ];
        }

        $statusCounts = Order::where('created_at', '>=', now()->subDays(30))
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $statusBreakdown = collect(Order::STATUSES)
            ->mapWithKeys(fn ($status) => [$status => (int) ($statusCounts[$status] ?? 0)]);

        $topMenuItems = OrderItem::query()
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', '!=', 'cancelled')
            ->groupBy('order_items.menu_item_id')
            ->orderByDesc('quantity_sold')
            ->limit(5)
            ->selectRaw('MAX(order_items.title) as title, SUM(order_items.quantity) as quantity_sold, SUM(order_items.line_total) as revenue')
            ->get();

        return view('admin.dashboard', [
            'todayOrdersCount' => $todayOrders->count(),
            'todayRevenue' => $todayOrders->sum('total'),
            'pendingReservations' => Reservation::where('status', 'pending')->count(),
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),
            'recentOrders' => Order::with('user')->latest()->limit(8)->get(),
            'revenueTrend' => $revenueTrend,
            'statusBreakdown' => $statusBreakdown,
            'topMenuItems' => $topMenuItems,
        ]);
    }
}
