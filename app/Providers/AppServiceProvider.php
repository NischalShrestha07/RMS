<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\SiteSetting;
use Illuminate\Auth\Events\Login;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Event::listen(function (Login $event) {
            $guestToken = request()->cookie(CartController::GUEST_COOKIE);
            $guestCart = $guestToken ? Cart::where('session_id', $guestToken)->first() : null;

            if (! $guestCart) {
                return;
            }

            $userCart = Cart::firstOrCreate(['user_id' => $event->user->id]);

            foreach ($guestCart->items as $guestItem) {
                $existing = $userCart->items()->where('menu_item_id', $guestItem->menu_item_id)->first();
                if ($existing) {
                    $existing->increment('quantity', $guestItem->quantity);
                } else {
                    $userCart->items()->create([
                        'menu_item_id' => $guestItem->menu_item_id,
                        'quantity' => $guestItem->quantity,
                    ]);
                }
            }

            $guestCart->delete();
        });

        View::composer(
            ['partials.home.topbar', 'partials.home.nav', 'partials.home.search-overlay', 'partials.home.footer'],
            function ($view) {
                $view->with('settings', $view->getData()['settings'] ?? SiteSetting::pluck('value', 'key'));
                $view->with('allCategories', $view->getData()['allCategories'] ?? Category::orderBy('sort_order')->get());
            }
        );

        View::composer('layouts.admin', function ($view) {
            $view->with('adminAlerts', [
                'unreadMessages' => [
                    'count' => ContactMessage::where('is_read', false)->count(),
                    'items' => ContactMessage::where('is_read', false)->latest()->take(5)->get(),
                ],
                'pendingReservations' => [
                    'count' => Reservation::where('status', 'pending')->count(),
                    'items' => Reservation::where('status', 'pending')->latest()->take(5)->get(),
                ],
                'pendingOrders' => [
                    'count' => Order::where('status', 'pending')->count(),
                    'items' => Order::where('status', 'pending')->latest()->take(5)->get(),
                ],
            ]);
        });
    }
}
