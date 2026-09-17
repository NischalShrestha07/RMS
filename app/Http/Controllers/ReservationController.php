<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(StoreReservationRequest $request)
    {
        Reservation::create($request->validated() + ['user_id' => $request->user()?->id]);

        return response()->json(['message' => "Table reserved! We'll confirm via email shortly."]);
    }
}
