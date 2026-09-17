@php($specialOffer = $specialOffer ?? null)
@csrf
@isset($specialOffer) @method('PUT') @endisset

@if ($errors->any())
<div class="alert alert-danger">
   <ul class="mb-0">
      @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
   </ul>
</div>
@endif

<div class="row g-3">
   <div class="col-md-12">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control fctrl" value="{{ old('title', $specialOffer?->title ?? '') }}" required>
   </div>
   <div class="col-md-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control fctrl" rows="3" required>{{ old('description', $specialOffer?->description ?? '') }}</textarea>
   </div>
   <div class="col-md-4">
      <label class="form-label">Old Price</label>
      <input type="number" step="0.01" name="old_price" class="form-control fctrl" value="{{ old('old_price', $specialOffer?->old_price ?? '') }}">
   </div>
   <div class="col-md-4">
      <label class="form-label">New Price</label>
      <input type="number" step="0.01" name="new_price" class="form-control fctrl" value="{{ old('new_price', $specialOffer?->new_price ?? '') }}" required>
   </div>
   <div class="col-md-4">
      <label class="form-label">Ends At</label>
      <input type="datetime-local" name="ends_at" class="form-control fctrl" value="{{ old('ends_at', $specialOffer?->ends_at?->format('Y-m-d\TH:i') ?? '') }}" required>
   </div>
   <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control fctrl" accept="image/*">
      @isset($specialOffer)
      <img src="{{ asset($specialOffer->image) }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;margin-top:8px;">
      @endisset
   </div>
   <div class="col-md-6 d-flex align-items-end">
      <div class="form-check">
         <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ old('is_active', $specialOffer?->is_active ?? true) ? 'checked' : '' }}>
         <label class="form-check-label" for="is_active">Active</label>
      </div>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($specialOffer) ? 'Update' : 'Create' }} Special Offer</button>
   <a href="{{ route('admin.special-offers.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
