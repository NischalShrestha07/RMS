<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('delivery.dashboard');
    }
}
