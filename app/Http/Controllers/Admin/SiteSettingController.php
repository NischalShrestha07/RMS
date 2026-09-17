<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteSettingController extends Controller
{
    private const KEYS = [
        'site_name', 'site_tagline',
        'hero_badge', 'hero_title', 'hero_description', 'hero_video_url',
        'phone', 'email', 'address_short', 'address_full', 'free_delivery_tag',
        'social_facebook', 'social_instagram', 'social_tiktok', 'social_youtube', 'social_twitter',
        'stat_happy_customers', 'stat_menu_items', 'stat_expert_chefs', 'stat_experience_years',
        'footer_about', 'about_story', 'copyright_year',
    ];

    public function index()
    {
        return view('admin.site-settings.index', [
            'settings' => SiteSetting::pluck('value', 'key'),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate(
            collect(self::KEYS)->mapWithKeys(fn ($key) => [$key => ['nullable', 'string']])->all()
        );

        foreach (self::KEYS as $key) {
            if (! $request->has($key)) {
                continue;
            }

            SiteSetting::updateOrCreate(['key' => $key], ['value' => $data[$key] ?? '']);
            Cache::forget("site_setting:{$key}");
        }

        return redirect()->route('admin.site-settings.index')->with('status', 'Settings updated.');
    }
}
