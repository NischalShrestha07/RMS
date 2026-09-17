@php($blogPost = $blogPost ?? null)
@csrf
@isset($blogPost) @method('PUT') @endisset

@if ($errors->any())
<div class="alert alert-danger">
   <ul class="mb-0">
      @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
   </ul>
</div>
@endif

<div class="row g-3">
   <div class="col-md-6">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control fctrl" value="{{ old('title', $blogPost?->title ?? '') }}" required>
   </div>
   <div class="col-md-6">
      <label class="form-label">Slug</label>
      <input type="text" name="slug" class="form-control fctrl" value="{{ old('slug', $blogPost?->slug ?? '') }}" required>
   </div>
   <div class="col-md-4">
      <label class="form-label">Tag</label>
      <input type="text" name="tag" class="form-control fctrl" value="{{ old('tag', $blogPost?->tag ?? '') }}" required>
   </div>
   <div class="col-md-4">
      <label class="form-label">Author</label>
      <input type="text" name="author" class="form-control fctrl" value="{{ old('author', $blogPost?->author ?? '') }}" required>
   </div>
   <div class="col-md-4">
      <label class="form-label">Published At</label>
      <input type="date" name="published_at" class="form-control fctrl" value="{{ old('published_at', $blogPost?->published_at?->format('Y-m-d') ?? '') }}" required>
   </div>
   <div class="col-md-4">
      <label class="form-label">Comments Count</label>
      <input type="number" name="comments_count" class="form-control fctrl" value="{{ old('comments_count', $blogPost?->comments_count ?? 0) }}">
   </div>
   <div class="col-md-8">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($blogPost)
      <img src="{{ asset($blogPost->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
   <div class="col-12">
      <label class="form-label">Excerpt</label>
      <textarea name="excerpt" class="form-control fctrl" rows="2" required>{{ old('excerpt', $blogPost?->excerpt ?? '') }}</textarea>
   </div>
   <div class="col-12">
      <label class="form-label">Body</label>
      <textarea name="body" class="form-control fctrl" rows="8">{{ old('body', $blogPost?->body ?? '') }}</textarea>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($blogPost) ? 'Update' : 'Create' }} Blog Post</button>
   <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
