<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $todayOrders = Order::whereDate('created_at', today())->get();

        return view('admin.dashboard', [
            'todayOrdersCount' => $todayOrders->count(),
            'todayRevenue' => $todayOrders->sum('total'),
            'pendingReservations' => Reservation::where('status', 'pending')->count(),
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),
            'recentOrders' => Order::with('user')->latest()->limit(8)->get(),
        ]);
    }
}
