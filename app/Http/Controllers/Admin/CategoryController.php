<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\UploadsImages;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use UploadsImages;

    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->uploadImage($request, 'image', 'categories') ?? '';
        $data['show_in_grid'] = $request->boolean('show_in_grid');

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->validated($request);

        if ($image = $this->uploadImage($request, 'image', 'categories')) {
            $data['image'] = $image;
        }
        $data['show_in_grid'] = $request->boolean('show_in_grid');

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Category deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'short_name' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'item_count' => ['nullable', 'integer', 'min:0'],
            'show_in_grid' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
