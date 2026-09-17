<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\UploadsImages;
use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryItemController extends Controller
{
    use UploadsImages;

    public function index()
    {
        return view('admin.gallery-items.index', [
            'galleryItems' => GalleryItem::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.gallery-items.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->uploadImage($request, 'image', 'gallery') ?? '';

        GalleryItem::create($data);

        return redirect()->route('admin.gallery-items.index')->with('status', 'Gallery item created.');
    }

    public function edit(GalleryItem $galleryItem)
    {
        return view('admin.gallery-items.edit', ['galleryItem' => $galleryItem]);
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $data = $this->validated($request);

        if ($image = $this->uploadImage($request, 'image', 'gallery')) {
            $data['image'] = $image;
        }

        $galleryItem->update($data);

        return redirect()->route('admin.gallery-items.index')->with('status', 'Gallery item updated.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        $galleryItem->delete();

        return redirect()->route('admin.gallery-items.index')->with('status', 'Gallery item deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
