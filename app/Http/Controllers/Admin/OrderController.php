<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        return view('admin.orders.index', [
            'orders' => $query->paginate(20)->withQueryString(),
            'statusFilter' => $request->string('status')->toString(),
            'statuses' => Order::STATUSES,
        ]);
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', [
            'order' => $order->load('items', 'user'),
            'statuses' => Order::STATUSES,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate(['status' => ['required', 'in:'.implode(',', Order::STATUSES)]]);

        $order->update(['status' => $request->status]);

        return back()->with('status', 'Order status updated.');
    }
}
