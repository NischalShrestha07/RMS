<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        [$from, $to] = $this->resolveRange($request);

        $orders = Order::whereBetween('created_at', ["{$from} 00:00:00", "{$to} 23:59:59"])
            ->where('status', '!=', 'cancelled')
            ->with('user')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.reports.index', [
            'from' => $from,
            'to' => $to,
            'orderCount' => $orders->total(),
            'totalRevenue' => (clone $this->rangeQuery($from, $to))->sum('total'),
            'orders' => $orders,
        ]);
    }

    public function export(Request $request): StreamedResponse
    {
        [$from, $to] = $this->resolveRange($request);

        $orders = $this->rangeQuery($from, $to)->with('user')->latest()->get();

        return response()->streamDownload(function () use ($orders) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['Order Number', 'Date', 'Customer', 'Status', 'Subtotal', 'Total']);
            foreach ($orders as $order) {
                fputcsv($out, [
                    $order->order_number,
                    $order->created_at->format('Y-m-d H:i:s'),
                    $order->user->name ?? 'Guest',
                    $order->status,
                    $order->subtotal,
                    $order->total,
                ]);
            }
            fclose($out);
        }, 'orders-report.csv');
    }

    private function resolveRange(Request $request): array
    {
        $from = $request->query('from') ?: now()->subDays(30)->format('Y-m-d');
        $to = $request->query('to') ?: now()->format('Y-m-d');

        return [$from, $to];
    }

    private function rangeQuery(string $from, string $to)
    {
        return Order::whereBetween('created_at', ["{$from} 00:00:00", "{$to} 23:59:59"])
            ->where('status', '!=', 'cancelled');
    }
}
