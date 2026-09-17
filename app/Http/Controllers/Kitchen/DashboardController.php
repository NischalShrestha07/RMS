<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kitchen.dashboard', [
            'orders' => Order::with('items')
                ->whereIn('status', ['pending', 'confirmed', 'preparing'])
                ->oldest()
                ->get(),
        ]);
    }
}
