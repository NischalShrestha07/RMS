# Sarab RMS

Full Laravel Restaurant Management System built on top of the Sarab (ThemeWagon) public-site template. Public site UI/UX is preserved as-is; everything else — cart/checkout, customer accounts, admin, kitchen, and delivery panels — is new.

## Stack

- Laravel (Blade, Breeze auth)
- MySQL
- `spatie/laravel-permission` for roles: `admin`, `kitchen`, `rider`, `customer`
- Cash on Delivery only — no payment gateway integration

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Set your MySQL credentials in `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`), then:

```bash
php artisan migrate
npm install && npm run build   # if a frontend build step is configured
php artisan serve
```

## Demo data

To wipe the database and seed it with demo content (categories, menu items, chefs, gallery, testimonials, blog posts, business hours, special offers, site settings) plus one test account per role:

```bash
php artisan app:demo-data
```

Test accounts (password: `password`):

| Role | Email |
|---|---|
| Admin | admin@sarab.test |
| Kitchen | kitchen@sarab.test |
| Rider | rider@sarab.test |
| Customer | customer@sarab.test |

## Panels

- `/` — public site (menu, reservations, contact, newsletter)
- `/cart`, `/checkout` — guest or logged-in ordering, COD only
- `/account` — customer order/reservation history, profile
- `/admin` — content CRUD, orders, reservations, messages, newsletter, users
- `/kitchen` — order queue (`pending → confirmed → preparing → ready`)
- `/delivery` — pickup pool, active deliveries, history (`ready → out_for_delivery → delivered`)

Each panel is guarded by role middleware; a role other than the panel's own gets a 403.

## Project structure notes

- `sarab/` and `Documentation/` are the original static template, kept untouched as a visual reference baseline — never edit these.
- `docs/PROJECT_CONTEXT.md` has the fuller build history, architecture decisions, and non-obvious gotchas encountered while building each phase.

---

Original design and markup: [Sarab](https://themewagon.com/themes/sarab/) by Bestwpware, distributed by ThemeWagon.
