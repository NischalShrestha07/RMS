<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\UploadsImages;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogPostController extends Controller
{
    use UploadsImages;

    public function index()
    {
        return view('admin.blog-posts.index', [
            'blogPosts' => BlogPost::orderByDesc('published_at')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.blog-posts.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->uploadImage($request, 'image', 'blog') ?? '';

        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post created.');
    }

    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog-posts.edit', ['blogPost' => $blogPost]);
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $data = $this->validated($request, $blogPost);

        if ($image = $this->uploadImage($request, 'image', 'blog')) {
            $data['image'] = $image;
        }

        $blogPost->update($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post updated.');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post deleted.');
    }

    private function validated(Request $request, ?BlogPost $blogPost = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('blog_posts', 'slug')->ignore($blogPost?->id)],
            'tag' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'published_at' => ['required', 'date'],
            'comments_count' => ['nullable', 'integer', 'min:0'],
            'excerpt' => ['required', 'string'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
