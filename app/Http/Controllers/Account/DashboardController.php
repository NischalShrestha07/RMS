<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('account.dashboard', [
            'recentOrders' => $user->orders()->latest()->take(3)->get(),
            'upcomingReservations' => $user->reservations()->where('date', '>=', now()->toDateString())->orderBy('date')->take(3)->get(),
        ]);
    }
}
