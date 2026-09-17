@php($galleryItem = $galleryItem ?? null)
@csrf
@isset($galleryItem) @method('PUT') @endisset

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
      <input type="text" name="title" class="form-control fctrl" value="{{ old('title', $galleryItem?->title ?? '') }}" required>
   </div>
   <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control fctrl" value="{{ old('sort_order', $galleryItem?->sort_order ?? 0) }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($galleryItem)
      <img src="{{ asset($galleryItem->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
   <div class="col-md-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control fctrl" rows="3">{{ old('description', $galleryItem?->description ?? '') }}</textarea>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($galleryItem) ? 'Update' : 'Create' }} Gallery Item</button>
   <a href="{{ route('admin.gallery-items.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
