@php($businessHour = $businessHour ?? null)
@csrf
@isset($businessHour) @method('PUT') @endisset

@if ($errors->any())
<div class="alert alert-danger">
   <ul class="mb-0">
      @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
   </ul>
</div>
@endif

<div class="row g-3">
   <div class="col-md-6">
      <label class="form-label">Day Label</label>
      <input type="text" name="day_label" class="form-control fctrl" value="{{ old('day_label', $businessHour?->day_label ?? '') }}" required placeholder="Monday">
   </div>
   <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control fctrl" value="{{ old('sort_order', $businessHour?->sort_order ?? 0) }}">
   </div>
   <div class="col-md-3 d-flex align-items-end">
      <div class="form-check">
         <input type="checkbox" name="is_closed" value="1" class="form-check-input" id="is_closed" {{ old('is_closed', $businessHour?->is_closed ?? false) ? 'checked' : '' }}>
         <label class="form-check-label" for="is_closed">Closed</label>
      </div>
   </div>
   <div class="col-md-6">
      <label class="form-label">Open Time</label>
      <input type="text" name="open_time" class="form-control fctrl" value="{{ old('open_time', $businessHour?->open_time ?? '') }}" placeholder="9:00 AM">
   </div>
   <div class="col-md-6">
      <label class="form-label">Close Time</label>
      <input type="text" name="close_time" class="form-control fctrl" value="{{ old('close_time', $businessHour?->close_time ?? '') }}" placeholder="10:00 PM">
   </div>
</div>

<div class="mt-4">
   <button type="submit" class="btn btn-red">{{ isset($businessHour) ? 'Update' : 'Create' }} Row</button>
   <a href="{{ route('admin.business-hours.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
