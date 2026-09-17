@php($menuItem = $menuItem ?? null)
@csrf
@isset($menuItem) @method('PUT') @endisset

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
      <input type="text" name="title" class="form-control fctrl" value="{{ old('title', $menuItem?->title ?? '') }}" required>
   </div>
   <div class="col-md-6">
      <label class="form-label">Category</label>
      <select name="category_id" class="form-control fctrl" required>
         <option value="">Select category</option>
         @foreach ($categories as $category)
         <option value="{{ $category->id }}" {{ old('category_id', $menuItem?->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
         @endforeach
      </select>
   </div>
   <div class="col-md-12">
      <label class="form-label">Short Description</label>
      <input type="text" name="short_description" class="form-control fctrl" value="{{ old('short_description', $menuItem?->short_description ?? '') }}" required>
   </div>
   <div class="col-md-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control fctrl" rows="4" required>{{ old('description', $menuItem?->description ?? '') }}</textarea>
   </div>
   <div class="col-md-3">
      <label class="form-label">Price</label>
      <input type="number" step="0.01" name="price" class="form-control fctrl" value="{{ old('price', $menuItem?->price ?? '') }}" required>
   </div>
   <div class="col-md-3">
      <label class="form-label">Old Price</label>
      <input type="number" step="0.01" name="old_price" class="form-control fctrl" value="{{ old('old_price', $menuItem?->old_price ?? '') }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Rating</label>
      <input type="number" step="0.1" min="0" max="5" name="rating" class="form-control fctrl" value="{{ old('rating', $menuItem?->rating ?? 5.0) }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Reviews Count</label>
      <input type="number" name="reviews_count" class="form-control fctrl" value="{{ old('reviews_count', $menuItem?->reviews_count ?? 0) }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Calories</label>
      <input type="number" name="calories" class="form-control fctrl" value="{{ old('calories', $menuItem?->calories ?? '') }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Prep Time (minutes)</label>
      <input type="number" name="prep_time_minutes" class="form-control fctrl" value="{{ old('prep_time_minutes', $menuItem?->prep_time_minutes ?? '') }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Badge Type</label>
      <select name="badge_type" class="form-control fctrl">
         <option value="">None</option>
         @foreach (['new' => 'New', 'hot' => 'Hot'] as $value => $label)
         <option value="{{ $value }}" {{ old('badge_type', $menuItem?->badge_type) == $value ? 'selected' : '' }}>{{ $label }}</option>
         @endforeach
      </select>
   </div>
   <div class="col-md-3">
      <label class="form-label">Badge Label</label>
      <input type="text" name="badge_label" class="form-control fctrl" value="{{ old('badge_label', $menuItem?->badge_label ?? '') }}" placeholder="e.g. Best Seller">
   </div>
   <div class="col-md-6">
      <label class="form-label">Tags (comma separated)</label>
      <input type="text" name="tags" class="form-control fctrl" value="{{ old('tags', is_array($menuItem?->tags) ? implode(', ', $menuItem->tags) : '') }}" placeholder="spicy, vegan">
   </div>
   <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control fctrl" value="{{ old('sort_order', $menuItem?->sort_order ?? 0) }}">
   </div>
   <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($menuItem)
      <img src="{{ asset($menuItem->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
   <div class="col-md-6 d-flex align-items-end">
      <div class="form-check">
         <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ old('is_active', $menuItem?->is_active ?? true) ? 'checked' : '' }}>
         <label class="form-check-label" for="is_active">Active (visible on site)</label>
      </div>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($menuItem) ? 'Update' : 'Create' }} Menu Item</button>
   <a href="{{ route('admin.menu-items.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
