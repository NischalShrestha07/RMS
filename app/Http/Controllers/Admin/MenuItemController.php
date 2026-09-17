<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\UploadsImages;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    use UploadsImages;

    public function index()
    {
        return view('admin.menu-items.index', [
            'menuItems' => MenuItem::with('category')->orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.menu-items.create', ['categories' => Category::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->uploadImage($request, 'image', 'menu') ?? '';
        $data['is_active'] = $request->boolean('is_active');
        $data['tags'] = $this->parseTags($request->input('tags', ''));

        MenuItem::create($data);

        return redirect()->route('admin.menu-items.index')->with('status', 'Menu item created.');
    }

    public function edit(MenuItem $menuItem)
    {
        return view('admin.menu-items.edit', [
            'menuItem' => $menuItem,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $this->validated($request);

        if ($image = $this->uploadImage($request, 'image', 'menu')) {
            $data['image'] = $image;
        }
        $data['is_active'] = $request->boolean('is_active');
        $data['tags'] = $this->parseTags($request->input('tags', ''));

        $menuItem->update($data);

        return redirect()->route('admin.menu-items.index')->with('status', 'Menu item updated.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')->with('status', 'Menu item deleted.');
    }

    private function parseTags(string $raw): array
    {
        return collect(explode(',', $raw))
            ->map(fn ($tag) => trim($tag))
            ->filter()
            ->values()
            ->all();
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'old_price' => ['nullable', 'numeric', 'min:0'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:5'],
            'reviews_count' => ['nullable', 'integer', 'min:0'],
            'calories' => ['nullable', 'integer', 'min:0'],
            'prep_time_minutes' => ['nullable', 'integer', 'min:0'],
            'badge_type' => ['nullable', 'string', 'max:255'],
            'badge_label' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
