@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Blog Posts</h5>
   <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-red">+ Add Blog Post</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Title</th><th>Tag</th><th>Author</th><th>Published</th><th>Comments</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($blogPosts as $blogPost)
         <tr>
            <td><img src="{{ asset($blogPost->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $blogPost->title }}</td>
            <td>{{ $blogPost->tag }}</td>
            <td>{{ $blogPost->author }}</td>
            <td>{{ $blogPost->published_at->format('M d, Y') }}</td>
            <td>{{ $blogPost->comments_count }}</td>
            <td class="text-end">
               <a href="{{ route('admin.blog-posts.edit', $blogPost) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.blog-posts.destroy', $blogPost) }}" class="d-inline" onsubmit="return confirm('Delete this blog post?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="7" class="text-muted text-center py-4">No blog posts yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $blogPosts->links() }}</div>
@endsection
