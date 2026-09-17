@php($coupon = $coupon ?? null)
@csrf
@isset($coupon) @method('PUT') @endisset

@if ($errors->any())
<div class="alert alert-danger">
   <ul class="mb-0">
      @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
   </ul>
</div>
@endif

<div class="row g-3">
   <div class="col-md-6">
      <label class="form-label">Code</label>
      <input type="text" name="code" class="form-control fctrl" value="{{ old('code', $coupon?->code ?? '') }}" required>
   </div>
   <div class="col-md-3">
      <label class="form-label">Type</label>
      <select name="type" class="form-control fctrl" required>
         <option value="percent" {{ old('type', $coupon?->type ?? '') === 'percent' ? 'selected' : '' }}>Percent</option>
         <option value="fixed" {{ old('type', $coupon?->type ?? '') === 'fixed' ? 'selected' : '' }}>Fixed</option>
      </select>
   </div>
   <div class="col-md-3">
      <label class="form-label">Value</label>
      <input type="number" step="0.01" name="value" class="form-control fctrl" value="{{ old('value', $coupon?->value ?? '') }}" required>
   </div>
   <div class="col-md-4">
      <label class="form-label">Max Uses</label>
      <input type="number" name="max_uses" class="form-control fctrl" value="{{ old('max_uses', $coupon?->max_uses ?? '') }}">
   </div>
   @isset($coupon)
   <div class="col-md-4">
      <label class="form-label">Used Count</label>
      <input type="number" class="form-control fctrl" value="{{ $coupon->used_count }}" readonly disabled>
   </div>
   @endisset
   <div class="col-md-4">
      <label class="form-label">Starts At</label>
      <input type="datetime-local" name="starts_at" class="form-control fctrl" value="{{ old('starts_at', $coupon?->starts_at?->format('Y-m-d\TH:i') ?? '') }}">
   </div>
   <div class="col-md-4">
      <label class="form-label">Expires At</label>
      <input type="datetime-local" name="expires_at" class="form-control fctrl" value="{{ old('expires_at', $coupon?->expires_at?->format('Y-m-d\TH:i') ?? '') }}">
   </div>
   <div class="col-md-6 d-flex align-items-end">
      <div class="form-check">
         <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ old('is_active', $coupon?->is_active ?? true) ? 'checked' : '' }}>
         <label class="form-check-label" for="is_active">Active</label>
      </div>
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($coupon) ? 'Update' : 'Create' }} Coupon</button>
   <a href="{{ route('admin.coupons.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
