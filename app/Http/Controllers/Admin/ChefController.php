<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\UploadsImages;
use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    use UploadsImages;

    public function index()
    {
        return view('admin.chefs.index', [
            'chefs' => Chef::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.chefs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->uploadImage($request, 'image', 'chefs') ?? '';
        $data['socials'] = $this->decodeSocials($request);

        Chef::create($data);

        return redirect()->route('admin.chefs.index')->with('status', 'Chef created.');
    }

    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit', ['chef' => $chef]);
    }

    public function update(Request $request, Chef $chef)
    {
        $data = $this->validated($request);

        if ($image = $this->uploadImage($request, 'image', 'chefs')) {
            $data['image'] = $image;
        }
        $data['socials'] = $this->decodeSocials($request);

        $chef->update($data);

        return redirect()->route('admin.chefs.index')->with('status', 'Chef updated.');
    }

    public function destroy(Chef $chef)
    {
        $chef->delete();

        return redirect()->route('admin.chefs.index')->with('status', 'Chef deleted.');
    }

    private function decodeSocials(Request $request): array
    {
        return json_decode((string) $request->input('socials'), true) ?? [];
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'years_experience' => ['nullable', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:4096'],
            'socials' => ['nullable', 'string'],
        ]);
    }
}
