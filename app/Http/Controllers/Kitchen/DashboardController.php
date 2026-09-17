<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kitchen.dashboard');
    }
}
