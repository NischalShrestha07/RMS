<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $riderId = auth()->id();

        return view('delivery.dashboard', [
            'available' => Order::where('status', 'ready')
                ->whereDoesntHave('delivery')
                ->oldest()
                ->get(),
            'active' => Order::with('delivery')
                ->whereIn('status', ['ready', 'out_for_delivery'])
                ->whereHas('delivery', fn ($q) => $q->where('rider_id', $riderId))
                ->oldest()
                ->get(),
            'history' => Delivery::with('order')
                ->where('rider_id', $riderId)
                ->whereNotNull('delivered_at')
                ->latest('delivered_at')
                ->limit(20)
                ->get(),
        ]);
    }
}
