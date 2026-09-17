<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = $request->user()
            ->reservations()
            ->latest('date')
            ->paginate(10);

        return view('account.reservations.index', ['reservations' => $reservations]);
    }
}
