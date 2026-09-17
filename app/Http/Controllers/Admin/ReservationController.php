<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    protected const STATUS_COLORS = [
        'pending' => '#f0ad4e',
        'confirmed' => '#2d6a4f',
        'cancelled' => '#999999',
    ];

    public function calendar()
    {
        return view('admin.reservations.calendar');
    }

    public function calendarData()
    {
        $events = Reservation::query()->get()->map(fn (Reservation $r) => [
            'title' => "{$r->name} ({$r->guests})",
            'start' => Carbon::parse($r->date->format('Y-m-d').' '.$r->time)->toIso8601String(),
            'color' => self::STATUS_COLORS[$r->status] ?? '#999999',
        ]);

        return response()->json($events);
    }

    public function index(Request $request)
    {
        $query = Reservation::query()->latest('date');

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        return view('admin.reservations.index', [
            'reservations' => $query->paginate(20)->withQueryString(),
            'statusFilter' => $request->string('status')->toString(),
        ]);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate(['status' => ['required', 'in:pending,confirmed,cancelled']]);

        $reservation->update(['status' => $request->status]);

        return back()->with('status', 'Reservation updated.');
    }
}
