<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BusinessHour;
use App\Models\Category;
use App\Models\Chef;
use App\Models\GalleryItem;
use App\Models\MenuItem;
use App\Models\SiteSetting;
use App\Models\SpecialOffer;
use App\Models\Testimonial;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, CartController $carts)
    {
        return view('home', [
            'cartCount' => $carts->cartCount($request),
            'settings' => SiteSetting::pluck('value', 'key'),
            'categories' => Category::where('show_in_grid', true)->orderBy('sort_order')->get(),
            'allCategories' => Category::orderBy('sort_order')->get(),
            'menuItems' => MenuItem::with('category')->where('is_active', true)->orderBy('sort_order')->get(),
            'chefs' => Chef::orderBy('sort_order')->get(),
            'galleryItems' => GalleryItem::orderBy('sort_order')->get(),
            'timelineEvents' => TimelineEvent::orderBy('sort_order')->get(),
            'businessHours' => BusinessHour::orderBy('sort_order')->get(),
            'testimonials' => Testimonial::orderBy('sort_order')->get(),
            'blogPosts' => BlogPost::orderBy('published_at', 'desc')->get(),
            'specialOffer' => SpecialOffer::where('is_active', true)->latest()->first(),
        ]);
    }
}
