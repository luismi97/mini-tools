# Tiny Knack

A fast, SEO-friendly portal of free online tools built with Laravel, Blade, Tailwind CSS and Alpine.js.
Most tools run entirely in the browser — user files and data never reach the server.

**54 tools** across 9 categories (developer, image, PDF, text, calculators, health, everyday, converters and generators) — see `database/seeders/ToolSeeder.php` for the full list.

## Setup

```bash
composer install
npm install
cp .env.example .env && php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm run build
php artisan serve
```

## Tests

```bash
php artisan test     # PHP feature + unit tests
npm run test:js      # JavaScript unit tests (node --test)
```

## Configuration

| Variable | Purpose |
|----------|---------|
| `ADS_ENABLED`, `ADS_CLIENT_ID`, `ADS_SLOT_*` | Google AdSense. Disabled = no ad markup at all. |
| `ANALYTICS_ENABLED`, `ANALYTICS_GA_ID`, `ANALYTICS_GTM_ID` | GA4 or Google Tag Manager. |
| `SITE_TWITTER` | Optional `twitter:site` handle. |

Project context, conventions and the checklist for adding a new tool are in [CLAUDE.md](CLAUDE.md).
