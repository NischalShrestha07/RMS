@extends('layouts.admin')

@section('title', 'Site Settings')

@php
   $text = fn ($key) => old($key, $settings[$key] ?? '');
@endphp

@section('content')
<h5 class="mb-3" style="font-weight:700;">Site Settings</h5>

@if ($errors->any())
<div class="alert alert-danger">
   <ul class="mb-0">
      @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
   </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.site-settings.update') }}">
   @csrf
   @method('PUT')

   <div class="admin-card mb-4">
      <h6 class="mb-3" style="font-weight:700;">General</h6>
      <div class="row g-3">
         <div class="col-md-6">
            <label class="form-label">Site Name</label>
            <input type="text" name="site_name" class="form-control fctrl" value="{{ $text('site_name') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Tagline</label>
            <input type="text" name="site_tagline" class="form-control fctrl" value="{{ $text('site_tagline') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control fctrl" value="{{ $text('phone') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control fctrl" value="{{ $text('email') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Address (short)</label>
            <input type="text" name="address_short" class="form-control fctrl" value="{{ $text('address_short') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Address (full)</label>
            <input type="text" name="address_full" class="form-control fctrl" value="{{ $text('address_full') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Free Delivery Tag</label>
            <input type="text" name="free_delivery_tag" class="form-control fctrl" value="{{ $text('free_delivery_tag') }}">
         </div>
         <div class="col-md-6">
            <label class="form-label">Copyright Year</label>
            <input type="text" name="copyright_year" class="form-control fctrl" value="{{ $text('copyright_year') }}">
         </div>
      </div>
   </div>

   <div class="admin-card mb-4">
      <h6 class="mb-3" style="font-weight:700;">Homepage Hero</h6>
      <div class="row g-3">
         <div class="col-md-12">
            <label class="form-label">Hero Badge</label>
            <input type="text" name="hero_badge" class="form-control fctrl" value="{{ $text('hero_badge') }}">
         </div>
         <div class="col-md-12">
            <label class="form-label">Hero Title (HTML allowed)</label>
            <textarea name="hero_title" class="form-control fctrl" rows="2">{{ $text('hero_title') }}</textarea>
         </div>
         <div class="col-md-12">
            <label class="form-label">Hero Description</label>
            <textarea name="hero_description" class="form-control fctrl" rows="3">{{ $text('hero_description') }}</textarea>
         </div>
         <div class="col-md-12">
            <label class="form-label">Hero Video URL</label>
            <input type="text" name="hero_video_url" class="form-control fctrl" value="{{ $text('hero_video_url') }}">
         </div>
      </div>
   </div>

   <div class="admin-card mb-4">
      <h6 class="mb-3" style="font-weight:700;">Social Links</h6>
      <div class="row g-3">
         @foreach (['social_facebook' => 'Facebook', 'social_instagram' => 'Instagram', 'social_tiktok' => 'TikTok', 'social_youtube' => 'YouTube', 'social_twitter' => 'Twitter'] as $key => $label)
         <div class="col-md-6">
            <label class="form-label">{{ $label }}</label>
            <input type="text" name="{{ $key }}" class="form-control fctrl" value="{{ $text($key) }}">
         </div>
         @endforeach
      </div>
   </div>

   <div class="admin-card mb-4">
      <h6 class="mb-3" style="font-weight:700;">Stats</h6>
      <div class="row g-3">
         <div class="col-md-3">
            <label class="form-label">Happy Customers</label>
            <input type="text" name="stat_happy_customers" class="form-control fctrl" value="{{ $text('stat_happy_customers') }}">
         </div>
         <div class="col-md-3">
            <label class="form-label">Menu Items</label>
            <input type="text" name="stat_menu_items" class="form-control fctrl" value="{{ $text('stat_menu_items') }}">
         </div>
         <div class="col-md-3">
            <label class="form-label">Expert Chefs</label>
            <input type="text" name="stat_expert_chefs" class="form-control fctrl" value="{{ $text('stat_expert_chefs') }}">
         </div>
         <div class="col-md-3">
            <label class="form-label">Years Experience</label>
            <input type="text" name="stat_experience_years" class="form-control fctrl" value="{{ $text('stat_experience_years') }}">
         </div>
      </div>
   </div>

   <div class="admin-card mb-4">
      <h6 class="mb-3" style="font-weight:700;">Content</h6>
      <div class="row g-3">
         <div class="col-md-12">
            <label class="form-label">Footer About</label>
            <textarea name="footer_about" class="form-control fctrl" rows="3">{{ $text('footer_about') }}</textarea>
         </div>
         <div class="col-md-12">
            <label class="form-label">About Story</label>
            <textarea name="about_story" class="form-control fctrl" rows="4">{{ $text('about_story') }}</textarea>
         </div>
      </div>
   </div>

   <button type="submit" class="btn btn-red">Save Settings</button>
</form>
@endsection
