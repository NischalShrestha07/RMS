@php($category = $category ?? null)
@csrf
@isset($category) @method('PUT') @endisset

@if ($errors->any())
<div class="alert alert-danger">
   <ul class="mb-0">
      @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
   </ul>
</div>
@endif

<div class="row g-3">
   <div class="col-md-6">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control fctrl" value="{{ old('name', $category?->name ?? '') }}" required>
   </div>
   <div class="col-md-6">
      <label class="form-label">Short Name</label>
      <input type="text" name="short_name" class="form-control fctrl" value="{{ old('short_name', $category?->getRawOriginal('short_name') ?? '') }}">
   </div>
   <div class="col-md-6">
      <label class="form-label">Slug</label>
      <input type="text" name="slug" class="form-control fctrl" value="{{ old('slug', $category?->slug ?? '') }}" required>
   </div>
   <div class="col-md-3">
      <label class="form-label">Item Count</label>
      <input type="number" name="item_count" class="form-control fctrl" value="{{ old('item_count', $category?->item_count ?? 0) }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control fctrl" value="{{ old('sort_order', $category?->sort_order ?? 0) }}">
   </div>
   <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($category)
      <img src="{{ asset($category->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
   <div class="col-md-6 d-flex align-items-end">
      <div class="form-check">
         <input type="checkbox" name="show_in_grid" value="1" class="form-check-input" id="show_in_grid" {{ old('show_in_grid', $category?->show_in_grid ?? true) ? 'checked' : '' }}>
         <label class="form-check-label" for="show_in_grid">Show in category grid</label>
      </div>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($category) ? 'Update' : 'Create' }} Category</button>
   <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
