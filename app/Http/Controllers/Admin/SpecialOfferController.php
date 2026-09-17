<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\UploadsImages;
use App\Http\Controllers\Controller;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    use UploadsImages;

    public function index()
    {
        return view('admin.special-offers.index', [
            'specialOffers' => SpecialOffer::latest()->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.special-offers.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->uploadImage($request, 'image', 'offers') ?? '';
        $data['is_active'] = $request->boolean('is_active');

        SpecialOffer::create($data);

        return redirect()->route('admin.special-offers.index')->with('status', 'Special offer created.');
    }

    public function edit(SpecialOffer $specialOffer)
    {
        return view('admin.special-offers.edit', ['specialOffer' => $specialOffer]);
    }

    public function update(Request $request, SpecialOffer $specialOffer)
    {
        $data = $this->validated($request);

        if ($image = $this->uploadImage($request, 'image', 'offers')) {
            $data['image'] = $image;
        }
        $data['is_active'] = $request->boolean('is_active');

        $specialOffer->update($data);

        return redirect()->route('admin.special-offers.index')->with('status', 'Special offer updated.');
    }

    public function destroy(SpecialOffer $specialOffer)
    {
        $specialOffer->delete();

        return redirect()->route('admin.special-offers.index')->with('status', 'Special offer deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'old_price' => ['nullable', 'numeric', 'min:0'],
            'new_price' => ['required', 'numeric', 'min:0'],
            'ends_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
