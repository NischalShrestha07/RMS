@php($chef = $chef ?? null)
@csrf
@isset($chef) @method('PUT') @endisset

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
      <input type="text" name="name" class="form-control fctrl" value="{{ old('name', $chef?->name ?? '') }}" required>
   </div>
   <div class="col-md-6">
      <label class="form-label">Role</label>
      <input type="text" name="role" class="form-control fctrl" value="{{ old('role', $chef?->role ?? '') }}" required>
   </div>
   <div class="col-md-3">
      <label class="form-label">Years Experience</label>
      <input type="number" name="years_experience" class="form-control fctrl" value="{{ old('years_experience', $chef?->years_experience ?? 0) }}">
   </div>
   <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control fctrl" value="{{ old('sort_order', $chef?->sort_order ?? 0) }}">
   </div>
   <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($chef)
      <img src="{{ asset($chef->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
   <div class="col-md-12">
      <label class="form-label">Socials (JSON, e.g. {"facebook":"#","instagram":"#"})</label>
      <textarea name="socials" class="form-control fctrl" rows="4">{{ old('socials', json_encode($chef?->socials ?? [], JSON_PRETTY_PRINT)) }}</textarea>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($chef) ? 'Update' : 'Create' }} Chef</button>
   <a href="{{ route('admin.chefs.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
