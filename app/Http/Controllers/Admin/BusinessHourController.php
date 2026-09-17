<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function index()
    {
        return view('admin.business-hours.index', [
            'businessHours' => BusinessHour::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.business-hours.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['is_closed'] = $request->boolean('is_closed');

        BusinessHour::create($data);

        return redirect()->route('admin.business-hours.index')->with('status', 'Business hour created.');
    }

    public function edit(BusinessHour $businessHour)
    {
        return view('admin.business-hours.edit', ['businessHour' => $businessHour]);
    }

    public function update(Request $request, BusinessHour $businessHour)
    {
        $data = $this->validated($request);
        $data['is_closed'] = $request->boolean('is_closed');

        $businessHour->update($data);

        return redirect()->route('admin.business-hours.index')->with('status', 'Business hour updated.');
    }

    public function destroy(BusinessHour $businessHour)
    {
        $businessHour->delete();

        return redirect()->route('admin.business-hours.index')->with('status', 'Business hour deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'day_label' => ['required', 'string', 'max:255'],
            'open_time' => ['nullable', 'string', 'max:255'],
            'close_time' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
