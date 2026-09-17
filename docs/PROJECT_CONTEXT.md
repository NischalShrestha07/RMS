# Sarab RMS — Project Context

## What this is
Laravel RMS built on top of the static ThemeWagon "Sarab" HTML template. Public site UI (`sarab/` reference copy) must render pixel-identical while becoming DB-driven. Panels: Admin, Customer (account + ordering), Kitchen/Staff, Delivery/Rider. COD only, no payment gateway. Full 18-phase plan lives in the plan-mode history; current progress tracked by phase number below.

## Standing priorities
- Never edit `sarab/` or `Documentation/` — read-only visual/reference baseline.
- New panel UI (admin/kitchen/delivery/account) reuses existing CSS tokens (`.btn-red`, `.stitle`, card patterns) — no bolted-on third-party admin theme.
- Auth is Breeze (Blade stack) restyled to Bootstrap-5 + Sarab classes, not Tailwind.
- Roles via `spatie/laravel-permission`: `admin`, `kitchen`, `rider`, `customer`.

## Progress
Phases 1–8 done (scaffold, assets/layout, static content models+seeders, home partials, menu wiring, public forms, Breeze auth, roles/guarding). Phases 9 (cart & checkout), 10 (customer account panel), 11 (admin panel shell) done and verified. Next: Phase 12 (admin content CRUD).

## Shipped: Admin panel shell (Phase 11)
- `layouts/admin.blade.php` — sidebar (grouped Overview/Content/Operations nav) + topbar + content area, styled from the same CSS custom properties as the public site (`--primary`, `--dark`, `--light`, `--shadow`, Poppins/Playfair Display), not a third-party admin theme.
- Sidebar nav items are declared for the full planned admin IA (categories, menu items, chefs, gallery, testimonials, blog, offers, hours, settings, orders, reservations, messages, newsletter, users) but each link is gated with `@if (Route::has($item['route']))` — renders as a disabled label until Phase 12/13 actually registers that route, so the layout doesn't need touching again as each admin section lands.
- `Admin\DashboardController` widgets: today's order count/revenue (`whereDate('created_at', today())`), pending reservations count, unread contact messages count, 8 most recent orders. Verified via curl: admin login → 200 on `/admin` with widgets rendering; customer login → 403 on `/admin` (role middleware intact).

## Shipped: Cart & Checkout (Phase 9)
- Guest cart identified by a dedicated `cart_token` cookie (`CartController::GUEST_COOKIE`), set via `Cookie::queue()` in `CartController::guestToken()` — 1yr expiry, encrypted (standard Laravel `EncryptCookies` middleware handles decrypt/encrypt transparently on read/write within the same app).
- On login, `AppServiceProvider::boot()` registers an `Illuminate\Auth\Events\Login` listener that reads the same `cart_token` cookie, finds the guest `Cart` by `session_id`, merges its items into (or creates) the user's `Cart`, then deletes the guest cart.
- Checkout (`CheckoutController`) requires an authenticated user (`resolveCart()` only builds a session-scoped cart for guests; order creation reads `$request->user()->id` directly), COD-only, generates `SR-XXXXXX` order numbers, empties the cart items on success.

### Gotcha: guest cart merge — don't use `session()->getId()`
Original implementation identified the guest cart by Laravel's session ID (`session()->getId()`). This broke silently: the session ID is regenerated during login (session-fixation protection), so the ID captured before login no longer matches the guest cart's `session_id` by the time the `Login` event listener runs — merge found nothing, guest cart orphaned, user saw an empty cart post-login.
**Fix:** identify the guest cart via an explicit, stable `cart_token` cookie instead of the session ID, read from the *same* cookie name in both `CartController` and the `Login` listener. Verified via full curl-driven E2E (guest add → login → cart merge → checkout → order visible in `/account/orders`) with a clean DB state — confirmed working 2026-09-17.

## Environment gotchas (this machine/session)
- A "dev-agent boundary guard" hook blocks Bash/Write calls referencing any path outside the project root — including paths inside string literals (e.g. `/tmp/foo.log` in a redirect). Route scratch output through an in-project path (`storage/app/scratch/` or similar, cleaned up after) instead of `/tmp` or `$HOME`.
- A PostToolUse PHP formatter hook strips `use` imports that have zero usages *at the moment that specific Edit lands* — including when the class is used elsewhere in the file but the edit sequence is split across multiple back-to-back `Edit` calls. Always add an import in the same `Edit` as a real usage, and re-grep the file for the `use` line after a multi-edit sequence to confirm it survived.
