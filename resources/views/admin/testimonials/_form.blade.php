@php($testimonial = $testimonial ?? null)
@csrf
@isset($testimonial) @method('PUT') @endisset

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
      <input type="text" name="name" class="form-control fctrl" value="{{ old('name', $testimonial?->name ?? '') }}" required>
   </div>
   <div class="col-md-6">
      <label class="form-label">Role</label>
      <input type="text" name="role" class="form-control fctrl" value="{{ old('role', $testimonial?->role ?? '') }}" required>
   </div>
   <div class="col-md-12">
      <label class="form-label">Message</label>
      <textarea name="message" class="form-control fctrl" rows="4" required>{{ old('message', $testimonial?->message ?? '') }}</textarea>
   </div>
   <div class="col-md-3">
      <label class="form-label">Rating</label>
      <input type="number" name="rating" class="form-control fctrl" min="1" max="5" value="{{ old('rating', $testimonial?->rating ?? 5) }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control fctrl" value="{{ old('sort_order', $testimonial?->sort_order ?? 0) }}">
   </div>
   <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($testimonial)
      <img src="{{ asset($testimonial->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($testimonial) ? 'Update' : 'Create' }} Testimonial</button>
   <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
