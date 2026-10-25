# Tiny Knacks — Project Context

Read this file before implementing any feature or change. Also read [MISTAKES.md](MISTAKES.md) and do not repeat any mistake listed there.

The full original plan (in Spanish) lives in [init.md](init.md). This file is the condensed, always-current reference. Update it whenever a decision changes or a phase is completed.

---

## 1. Hard rules (never break)

1. **English is the default language; also Spanish (since 2026-10-06), Portuguese (Brazil), French, German and Italian (since 2026-10-08); more may follow.** Code, identifiers, comments, translation keys and base DB columns are English. Every user-facing string must be translatable (`__()` in Blade/PHP, `t()`/`$t()` in JS) and every new tool/page needs translations in **all** locales (see §17). Conversation with the user is in Spanish. Never duplicate the app per language.
2. **Log every mistake** in [MISTAKES.md](MISTAKES.md) as soon as it is detected (what happened, root cause, rule to prevent it). Check that file before starting work.
3. MVP only: no auth, no payments, no complex dashboard/admin, no public API.
4. Client-side processing whenever possible. Never upload files/JSON to the server if the browser can do it.
5. No React unless a specific tool truly needs it. Blade + Alpine.js first.
6. Each tool is isolated. Adding a new tool must not require modifying existing tools. No giant `ToolController` full of `if`s.
7. Priorities: SEO and speed (Core Web Vitals). Load only the JS a page needs.
8. No duplicated logic; reusable Blade components.
9. Tests for critical parts.
10. Simplify anything in the plan that is needlessly complex, as long as scalability is preserved.

## 2. Goal and business model

A fast, SEO-friendly portal of free mini tools that grows to dozens of independent tools.
Revenue: ads on free tools → Premium (no ads, larger files, batch, advanced features) → affiliates later. Organic SEO is the main traffic source.

### Brand

- **Name: Tiny Knacks**, domain **tinyknacks.com** (registered 2026-10-12 through Google Workspace → registrar Squarespace Domains; Google Workspace email on the domain). Renamed from "Tiny Knack" (chosen 2026-10-06) so brand and domain match; no product named "Tiny Knacks" was found. Tagline: "Tiny tools with a knack for everyday tasks."
- **Hosting decision (2026-10-12)**: Cloudways (the owner already has an account) with DNS on Cloudflare (nameservers changed at Squarespace; keep the Google Workspace MX/SPF/DKIM records). Cloudways only runs `git pull`, so `.github/workflows/deploy.yml` runs the tests, builds (composer + npm), rsyncs to Cloudways over SSH (never touching `.env`, the SQLite file or `storage/`), migrates + seeds, optimizes and purges Cloudflare. Every push to `main` (or "Run workflow") tests and deploys. Server (own Cloudways account; recreated 2026-10-21 after the first one was deleted): app folder `yyyrsdhezx`, PHP 8.2, production `.env` created on the server with its `APP_KEY`; local SSH alias `tinyknacks` (key `~/.ssh/tinyknacks_deploy`, also the GitHub deploy key). Full procedure: `docs/LAUNCH.md`.
- History: placeholder "Mini Tools" → dropped (minitools.space "MiniTools" exists, similar 2×2 logo). "Tab Pantry" → dropped ("pantry" = food; Google shows food banks; does not suggest tools). Never reuse those names or a 2×2-squares logo.
- **Symbol**: a geometric lowercase "k" (stem + diagonal arm, round caps, stroke 3.6/32) whose lower leg is a dot = "tiny". White on brand teal `#0f766e`, squircle radius 9/32. Fixed colors (does not invert in dark mode). Three implementations to keep in sync: `components/logo-mark.blade.php`, `public/favicon.svg`, `GenerateSeoImages::logoMark()`.
- **Wordmark** (`components/wordmark.blade.php`): one lowercase word, "tiny" regular + muted, "knack" semibold — derived from `config('site.name')`. The OG images use the same treatment.
- Design rules for brand assets: one idea per symbol, geometric shapes, consistent stroke, legible at 16 px, test on light and dark backgrounds at 16/32/64/180 px before adopting. Avoid AI clichés (sparkles) and fine details.
- The name comes only from `APP_NAME` (`config('site.name')`). To rename: change `.env`, restart `php artisan serve`, run `php artisan seo:images`, and update the 2 tests that assert the title.

## 3. Stack

Laravel · PHP · Blade (+ Blade Components) · Tailwind CSS · Alpine.js (when needed) · Vite · SQLite (was MySQL; the catalog is tiny and read-only) · Eloquent.

Versions installed: **Laravel 12**, PHP 8.2, Tailwind CSS 4 (`@tailwindcss/vite`, no tailwind.config.js), Vite 7, Alpine.js 3, SQLite (`database/database.sqlite`, git-ignored, rebuilt by migrate --seed).
Extra JS deps (all bundled, per-tool): `qrcode-generator` (QR matrix), `fflate` (zip for "Download All", lazy-loaded), `pdf-lib` (create/merge/split PDF, lazy-loaded), `pdfjs-dist` v5 (render PDF pages, lazy-loaded with its worker via `?url`), `heic-to/csp` (libheif HEIC decoder, ~3 MB, LGPL-3.0 — loaded unmodified as a separate chunk only when the browser cannot decode HEIC natively; attribution shown on /heic-to-jpg).

### Local environment (Windows 11)

| Tool | Status |
|------|--------|
| PHP | 8.2.12 at `C:\xampp\php` (added to user PATH; ext gd, intl, zip, sodium, sqlite3 enabled; backup `php.ini.bak-2026-10-06`) |
| Composer | 2.10 at `%USERPROFILE%\bin\composer(.bat)` (on user PATH) |
| Database | SQLite file `database/database.sqlite` (create with `touch`, then `php artisan migrate --seed`). XAMPP MariaDB is no longer needed. |
| Node / npm | v22.11.0 / 10.9.0 (Vite 7 officially wants ≥ 22.12 but builds fine) |
| Git | 2.47.1 (project is not a git repo yet) |

In a session started before PATH changed, prefix Bash commands with
`export PATH="/c/xampp/php:/c/xampp/mysql/bin:$HOME/bin:$PATH"`.
In Git Bash, set `MSYS_NO_PATHCONV=1` when passing URL paths like `/` to node scripts.

### Commands

```bash
php artisan serve                 # http://127.0.0.1:8000
npm run dev                       # Vite dev server (or `npm run build`)
php artisan migrate:fresh --seed  # reset DB (SQLite) with categories + tools
php artisan seo:images            # regenerate OG images, icons, logo, manifest (commit the output)
php artisan test                  # PHP feature/unit tests (sqlite :memory:)
npm run test:js                   # JS unit tests (node --test, no extra deps)
php vendor/bin/pint               # PHP code style
```

## 4. Architecture

```text
app/
├── Http/Controllers/
│   ├── HomeController.php
│   ├── CategoryController.php
│   ├── ToolController.php        # thin: resolves active tool by slug → view tools/{slug}
│   ├── SitemapController.php     # /sitemap.xml + /robots.txt (dynamic)
│   └── Tools/<Name>Controller.php  # ONLY if a tool needs a backend (none yet)
├── Http/Middleware/SecurityHeaders.php
├── Models/ Category.php, Tool.php   # saving/deleting flushes the Catalog cache
└── Support/
    ├── Catalog.php   # cached active categories/tools; popular/recent/related/searchIndex
    ├── Seo.php       # per-page title/description/canonical/OG/Twitter/JSON-LD/breadcrumbs
    └── Icons.php     # inline SVG icon paths (Lucide subset) → <x-icon name="..."/>

config/ ads.php, analytics.php, site.php

resources/
├── css/app.css                    # Tailwind 4 + design tokens (light/dark via CSS vars)
├── js/
│   ├── app.js                     # Alpine + global search + analytics hooks (every page)
│   ├── components/search.js
│   ├── lib/                       # shared + PURE logic (unit-tested in tests/js)
│   │   ├── analytics.js (track), utils.js (formatBytes/Number/Money, copy, download, debounce)
│   │   ├── Alpine factories: text-tool.js, image-batch.js, file-list.js, images-to-pdf-tool.js
│   │   ├── domain logic: json, csv, base64, url, jwt, uuid, image, resize, pdf, page-ranges,
│   │   │                 loan, compound, age, calculators (percentage/tip/salary), qr
│   └── tools/<slug>.js            # one Vite entry per tool, auto-discovered by vite.config.js
└── views/
    ├── components/
    │   ├── layouts/app.blade.php  # <head> SEO, analytics, ads script, header/footer, search index
    │   ├── tool-page.blade.php    # common tool structure (props: steps, faq, clientSide; slots: script, about)
    │   ├── ads/ slot, top, bottom, sidebar
    │   ├── analytics.blade.php, analytics/noscript.blade.php
    │   ├── dropzone.blade.php        # file drop area (needs dragging/onDrop/onPick)
    │   ├── image-batch.blade.php, fields/quality.blade.php   # batch image tools (imageBatch)
    │   ├── text-tool.blade.php       # input → output text tools (textTool)
    │   ├── file-list.blade.php       # ordered, reorderable file list (fileList)
    │   ├── images-to-pdf.blade.php   # JPG/Image to PDF settings (imagesToPdfTool)
    │   ├── segmented.blade.php       # segmented control: <x-segmented model="options.mode" :options="[...]"/>
    │   └── icon, logo-mark, search, site-header, site-footer, breadcrumbs, tool-card, tool-header
    ├── home, category, sitemap, errors/404
    └── tools/<slug>.blade.php
```

Client-only tools need no controller/service; the view `tools/<slug>.blade.php` + its JS entry are enough.

### Conventions (follow these)

- **Tool JS** registers its Alpine component with `document.addEventListener('alpine:init', () => window.Alpine.data('camelName', ...))`. Never import/start Alpine in a tool entry; `app.js` starts Alpine on `DOMContentLoaded` after all module scripts ran.
- **Tool view** = `<x-tool-page :tool :seo :related :steps="[...]" :faq="[...]">` + `<x-slot:script>@vite('resources/js/tools/<slug>.js')</x-slot:script>`. Steps/FAQ feed the page and the FAQPage JSON-LD.
- Put non-DOM logic in `resources/js/lib/<name>.js` and add `tests/js/<name>.test.js`. Files tested with Node must not touch the DOM at import time and must use explicit `.js` extensions in relative imports (Node requires them; Vite does not).
- Analytics: call `track(event, params)` from `lib/analytics.js`. Only metadata (counts, formats, sizes) — never user content, file names or form values.
- Buttons: always `class="btn btn-primary|btn-secondary|btn-ghost"` (Tailwind 4 cannot `@apply` custom classes). Form controls: `field`, `label`; cards: `panel`; small caps label: `kicker`.
- Colors only via tokens (`bg-paper`, `bg-surface`, `bg-sunken`, `text-ink`, `text-muted`, `text-faint`, `border-line`, `accent`, `danger`, `success` …). Dark mode is automatic through CSS variables; keep text ≥ 4.5:1 contrast.
- `sort_order`: **lower = more prominent** (popular tools = first by sort_order).
- Empty categories render with `noindex` and are excluded from the sitemap.
- Free-tier limits for file tools live in `resources/js/lib/image.js` (`LIMITS`) and `resources/js/lib/pdf.js` (`PDF_LIMITS`); Pro can raise them later.
- **Reuse before writing a new UI**: text in/out → `textTool` + `<x-text-tool>`; batch image processing → `imageBatch` + `<x-image-batch>`; ordered multi-file → `fileList` + `<x-file-list>`; page-level PDF edits with thumbnails → `pdfPagesTool` + `<x-pdf-pages mode="rotate|delete|organize">`; single file → `<x-dropzone :multiple="false">`; balance curves → `balanceChart()` (`lib/chart.js`) + `<x-balance-chart data="chart()">` (inline SVG, no chart library; needs `money()`); PDF page previews → `renderThumbnails(doc, { onThumb, cancelled })` from `lib/pdf.js`.
- **Shareable calculators**: keep inputs in one `form` object with a `defaults` object, read `decodeState(location.hash, defaults, allowed)` in `init()` and write `encodeState()` with `history.replaceState` on change (`lib/share-state.js`). The hash never reaches the server, so Cloudflare caching is unaffected. Add a "Copy link" button (see loan/mortgage/credit card).
- `fileList`'s `describe` may return `{ meta, pages, thumb }` (Merge PDF shows first-page previews and the total page count).
- Durations and month/year dates: `formatDuration(months)` and `formatMonthYear(date)` from `lib/utils.js`.
- New image format converters are ~10 lines: an `imageBatch` entry with `accept` + `outputType`. `decodeImage()` supports JPG, PNG, WebP, HEIC/HEIF (lazy decoder) and SVG (size from width/height or viewBox via `svgSize()`, rendered through `<img>` so embedded scripts never run). `encodeImage()` accepts `background` (hex) to fill transparency; `imageBatch` passes `settings.background`.
- User-supplied code-like input that could hang the tab (e.g. regex) runs in a Web Worker with a timeout (`lib/regex-worker.js` + `regex-tester.js`: terminate and recreate the worker on timeout). Import workers with `new Worker(new URL('../lib/x.js', import.meta.url), { type: 'module' })`.
- Timers use absolute end times (`Date.now()` deltas), never tick counting, so they stay accurate in background tabs; clean up intervals in Alpine `destroy()`.
- Health calculators share `bodyInput()` + `<x-fields.body />` (US/metric weight & height). Health pages must keep the "not medical advice" disclaimer (YMYL content).
- Randomness for user-facing draws uses `randomInt()` from `lib/password.js` (crypto, unbiased) — never `Math.random()` for results (animations are fine).
- Calculators reuse engines: mortgage, auto loan and loan comparison → `lib/loan.js` (`calculateLoan` accepts `extra` principal per payment; `extraSavings`, `paymentDate`); credit cards → `lib/credit-card.js`; dates → `lib/age.js` (`addMonths`, `calculateAge`). Keep finance math in `lib/` with reference-value tests (e.g. $320k @ 6.5% / 30y = $2,022.62).
- Color tokens available: paper, surface, sunken, ink, muted, faint, line, line-strong, accent(-strong/-soft), danger(-soft), success(-soft), warning, info.
- **Never keep class instances with private `#fields` (e.g. pdf.js documents) in Alpine state** — Alpine's reactive Proxy breaks them. Keep them in a closure variable inside the `Alpine.data` factory (see `pdf-to-jpg.js`). `File`/`Blob` are safe (not proxied).
- Alpine factories that tools extend with `...spread` must not define getters (spread evaluates them once); use methods instead.
- FAQ/steps strings live inside a double-quoted Blade attribute (`:faq="[...]"`): use single-quoted PHP strings and escape `'` as `\'`. For a literal `"` in visible text write `&quot;` (the FAQPage JSON-LD decodes entities). **Inside HTML attributes within those strings never use `&quot;`** — use `class=\'...\'` instead.
- `textTool` `convert()` may return `{ text, meta }`; `meta` is then available in the view (e.g. "4 removed").
- `decodeImage()` handles HEIC/HEIF for every image tool (native first, then lazy `heic-to`). Browsers cannot *encode* HEIC, so "Same as input" must map HEIC → JPG (see image-compressor.js).
- Calculators track use with `@input.once="trackUse()"` on the root element.
- Number/money/date display: `formatNumber` / `formatMoney` from `lib/utils.js`, and `toLocaleDateString(intlLocale())` — never hardcode `'en-US'`.
- Production: `APP_ENV=production` makes robots.txt allow crawling and forces root URL/https from `APP_URL`. Run `php artisan optimize` on deploy. `public/.htaccess` sets long cache for `/build/assets`. Full deploy procedure: `docs/LAUNCH.md`.
- **No sessions, no cookies on public pages**: `StartSession`, `ShareErrorsFromSession` and `ValidateCsrfToken` are removed from the `web` group (`bootstrap/app.php`) so Cloudflare can cache full HTML. `PublicCache` sends `Cache-Control: public, max-age=300, s-maxage=86400` for 200 GET responses in production only. `LaunchReadinessTest` fails if a public page sets a cookie. A future tool with a backend form must get its own route group that re-adds `StartSession` + `ValidateCsrfToken` (and is excluded from the Cloudflare cache rule).
- Proxies: `trustProxies(at: '*')` because the site runs behind Cloudflare.
- **AdSense plumbing**: `ADS_CLIENT_ID` alone renders `<meta name="google-adsense-account">` and serves `/ads.txt` (404 until set); ad units render only with `ADS_ENABLED=true` and slot IDs.
- **Consent Mode v2**: the GA4 snippet sets consent defaults (denied in `config('analytics.consent_regions')` = EEA/UK/CH, granted elsewhere) before `gtag('config')`; Google's AdSense CMP banner updates it. With GTM, configure consent inside the container instead.

## 5. Data model

**categories**: id, name, slug, description, icon, is_active, sort_order, timestamps.

**tools**: id, name, slug (unique), description, short_description, category_id, icon, is_active, is_premium, ads_enabled, seo_title, seo_description, sort_order, timestamps.

Menus, category pages, related tools and sitemap are generated from this data.
Initial data via seeders (no admin panel in MVP).

Categories (9): Developer Tools, Image Tools, PDF Tools, Calculators, Health Calculators, Converters, Text Tools, Everyday Tools, Generators.
Tools (58, as of 2026-10-25), in priority order (`sort_order`) in `ToolSeeder`. An entry may set an explicit `sort_order` (e.g. 65) to slot between existing tools without renumbering them.
- Developer Tools: JSON Formatter, Base64 Encoder & Decoder, URL Encoder & Decoder, JWT Decoder, Hash Generator, Unix Timestamp Converter, Color Converter & Contrast Checker, Regex Tester
- Image Tools: Image Compressor, Image Resizer, HEIC to JPG, Crop Image, PNG to JPG, JPG to PNG, JPG to WebP, PNG to WebP, WebP to JPG, WebP to PNG, SVG to PNG, Image to PDF
- PDF Tools: Merge PDF, Split PDF, Rotate PDF, Organize PDF, Add Page Numbers to PDF, Delete PDF Pages, PDF to JPG, JPG to PDF
- Calculators: Loan, Credit Card Payoff, Loan Comparison, Mortgage, Auto Loan, Debt Payoff, Compound Interest, Percentage, Date, Age, Tip, Salary
- Health Calculators: BMI, Calorie (TDEE), Pregnancy Due Date
- Everyday Tools: Online Timer & Stopwatch, Random Name Picker
- Converters: Unit Converter, JSON to CSV, CSV to JSON
- Generators: QR Code Generator, Password Generator, UUID Generator, Random Number Generator
- Text Tools: Word Counter, Case Converter, Text Compare, Remove Duplicate Lines, Sort Lines, Lorem Ipsum Generator

## 6. URLs

- Tools: `/{slug}` → `/json-formatter`, `/image-compressor`, `/jpg-to-webp`, `/loan-calculator`, `/qr-generator`
- Categories: `/category/{slug}`
- Other locales: `/{prefix}`, `/{prefix}/{localized-slug}` (`/es/unir-pdf`, `/pt/juntar-pdf`, `/fr/fusionner-pdf`, `/de/pdf-zusammenfuegen`, `/it/unisci-pdf`), `/{prefix}/{category-segment}/{slug}` (`categoria`, `categoria`, `categorie`, `kategorie`, `categoria`), trust pages with localized slugs (`/de/ueber-uns`). English slugs under a prefix 301 to the localized slug, so a localized slug must never equal another tool's English slug (`I18nTest` checks it). Build URLs with `lroute()` / `$tool->url($locale)`, never `route()` or hardcoded paths.
- `/sitemap.xml`, `/robots.txt`
- Never `?id=` style URLs. The `/{slug}` catch route must be registered last and only match active tool slugs.

## 7. Tool page structure (all tools)

Breadcrumb → Title → Description → Ad (top) → Tool interface → Result → Ad (bottom) → How to use → FAQ → Related tools (same category initially).

## 8. Ads

Components `<x-ads.top />`, `<x-ads.sidebar />`, `<x-ads.bottom />`; central config (`config/ads.php`) from env:
`ADS_ENABLED`, `ADS_CLIENT_ID`, `ADS_SLOT_TOP`, `ADS_SLOT_BOTTOM`, `ADS_SLOT_SIDEBAR`.
Render nothing when disabled globally, when `tool->ads_enabled` is false, or when the tool is premium. Non-intrusive; never block tool functionality. No AdSense code inside tool views.

## 9. SEO

Per page: `<title>`, meta description, canonical, robots (`index, follow, max-image-preview:large…` or `noindex`), Open Graph (title, description, image + alt), Twitter card, breadcrumbs, Schema.org.
Sitemap: homepage + active categories with tools + active tools + trust pages.

Implemented SEO system (keep it consistent when adding pages/tools):
- **Titles** (`Seo::fullTitle`): " | Tiny Knacks" (site name) is appended only if the result fits in 60 chars (`Seo::MAX_TITLE`). `seo_title` itself must be ≤ 60, `seo_description` ≤ 160 (enforced by `ToolPageTest`).
- **Schema**: Home = `WebSite` + `Organization` (`Seo::organization()`, logo `images/logo-512.png`); tools = `WebApplication` (+ `dateModified`, `image`, `publisher` → `#organization`) + `BreadcrumbList` + `FAQPage`; categories = `CollectionPage` with `ItemList` of tools; trust pages = `AboutPage`/`ContactPage`/`WebPage`.
- **Content**: every tool has long-form copy in `tools.content` (source: `database/seeders/content/tools.php`, ≥ 80 words, h2 sections) rendered between "How to use" and FAQ. Categories have `intro` (`database/seeders/content/categories.php`). Home has an "All tools" directory linking every tool.
- **Internal links**: `App\Support\InternalLinker` auto-links the first mention of any other tool name in content, FAQ answers and category intros (never in headings/code/links, never self). Write tool names exactly as in the seeder (use `&amp;` for "&") to get links.
- **Images**: `php artisan seo:images` generates OG images (`public/images/og/{slug}.png`, `category-{slug}.png`, default), favicon.ico, apple-touch-icon, PWA icons, logo and `site.webmanifest`. Re-run after adding/renaming tools and commit the files (fonts: Segoe UI on Windows, DejaVu on Linux).
- **Freshness**: tool header shows "Updated Month Year" from `updated_at`.
- **Canonical URLs**: global `CanonicalUrl` middleware 301s uppercase paths to lowercase and, in production, any other host/scheme (www, http) to `APP_URL`.
- **Trust pages** (`PageController::PAGES`): /about, /privacy-policy (AdSense cookie disclosure), /terms, /suggest-a-tool, /contact — linked in the footer. Contact email: `SITE_CONTACT_EMAIL` (info@tinyknacks.com). /suggest-a-tool (`<x-suggest-tool>`) has no backend: the form opens a prefilled `mailto:` to the contact email (plus a "copy suggestion" fallback), so public pages stay cookie-free; it is linked from home, the search empty state, About and Contact.
- **Verification**: `SITE_GOOGLE_VERIFICATION`, `SITE_BING_VERIFICATION` render the meta tags.

## 10. Analytics

`<x-analytics />` component, GA4/GTM, toggled by config. Events: `tool_open`, `tool_use`, `tool_result`, `file_upload`, `file_download`, `premium_click`, `ad_click`. Never send user content or sensitive data.

## 11. Tool specs (MVP)

- **JSON Formatter** — textarea; Format, Minify, Validate, Copy, Clear. Optional JSON→CSV, JSON→TypeScript. Browser only. SEO title: "JSON Formatter & Validator Online".
- **Image Compressor** — JPG/JPEG/PNG/WebP; drag & drop, file picker, preview, original/compressed size, % reduction, quality slider, download, multiple files. Client-side, reasonable size limit.
- **JPG to WebP** — upload, drag & drop, preview, quality, convert, download, multiple files + "Download All". Client-side.
- **Loan Calculator** — amount, rate, term, frequency (monthly/biweekly/weekly) → payment, total interest, total paid, amortization table. JS only. Disclaimer: "This calculator provides estimates for informational purposes only. Actual loan terms may vary by lender."
- **QR Generator** — URL, text, email, phone, WiFi; size, margin, foreground/background color; download PNG and SVG.

## 12. Security

CSRF, rate limiting on any endpoint, file validation (MIME + size), sanitization, XSS protection, dangerous upload protection. Tools without backend needs get no endpoints.

## 13. Implementation phases

Build phase by phase. After each phase: verify it builds, run relevant tests, check errors, briefly explain what was done, then continue.

| # | Phase | Status |
|---|-------|--------|
| 1 | Laravel + Tailwind + Vite | done 2026-10-06 |
| 2 | General layout | done |
| 3 | Categories system | done |
| 4 | Tools system | done |
| 5 | Homepage | done |
| 6 | SEO | done |
| 7 | Ads components | done |
| 8 | Analytics | done |
| 9 | JSON Formatter (+ CSV, TypeScript) | done |
| 10 | Image Compressor | done |
| 11 | JPG to WebP | done |
| 12 | Loan Calculator | done |
| 13 | QR Generator | done |
| 14 | Sitemap + robots.txt | done |
| 15 | Performance optimization | done — Lighthouse mobile (dev server): perf 93–99, a11y 100, best practices 100, CLS ≈ 0 |
| 16 | Tests | done |
| 17 | 20 more tools (full original backlog) | done 2026-10-06 — 32 PHP tests (607 assertions), 36 JS tests; all 28 pages checked at 390px with no overflow/console errors; Lighthouse perf 91–98, a11y 100 |
| 18 | Text Tools (6), Password Generator, HEIC to JPG (+ HEIC input in Compressor/Resizer) | done 2026-10-06 — 32 PHP tests (768 assertions), 44 JS tests; new pages checked at 390px; Lighthouse perf 97–98, a11y 100 |
| 19 | SEO sweep | done 2026-10-06 — smart titles, robots max-image-preview, Organization/ItemList/dateModified schema, long-form content for 33 tools + 7 categories, auto internal linking, All-tools directory, OG images per page, favicons/manifest, trust pages, canonical-host + lowercase 301s; 42 PHP tests (1179 assertions); Lighthouse SEO 100 except `is-crawlable` (expected outside production) |
| 20 | 10 more tools (image converters, Rotate/Delete PDF pages, Mortgage, Debt Payoff, Unit Converter, Date Calculator) | done 2026-10-06 — 48 PHP tests (1505 assertions), 50 JS tests; all verified end-to-end in the browser and at 390px |
| 21 | 11 more tools (Hash, Timestamp, Color, Regex, BMI, Calorie, Due Date, Auto Loan, Random Number, Name Picker, Online Timer) + 2 categories + "All tools" header link | done 2026-10-06 — 48 PHP tests (1843 assertions), 58 JS tests; all verified in the browser and at 390px |
| 22 | Bilingual site: English (default) + Spanish under /es, extensible (§17) | done 2026-10-06 — all UI, JS messages, 54 tools, 9 categories, 4 legal pages and OG images translated; hreflang/sitemap alternates/switcher; 56 PHP tests (3170 assertions), 60 JS tests; 68 Spanish URLs checked in Chrome at 390px with no console errors/overflow |
| 23 | Portuguese (pt-BR), French, German, Italian | done 2026-10-08 — full translation of UI, JS messages, 54 tools, 9 categories, 4 legal pages and 256 OG images; per-locale default currency (BRL/EUR); InternalLinker no longer nests links for overlapping names; wrapping language switcher and text-tool toolbars; 58 PHP tests (8580 assertions), 61 JS tests; 408 URLs (6 locales) checked in Chrome at 390px with no overflow/console errors |
| 24 | Finance + PDF upgrade (most used at launch) | done 2026-10-25 — Loan: extra payments, first-payment date, payment dates, balance chart, shareable link; Mortgage: extra payments, chart, link, i18n fixes ("30 years", "Taxes, insurance & fees", hardcoded "$"); Merge PDF: first-page previews, total pages, file name, ready panel, Sort A–Z; Split PDF: click-to-select page grid; new tools Credit Card Payoff, Loan Comparison (effective APR), Organize PDF, Add Page Numbers to PDF (upright on rotated pages); 60 PHP tests (9190 assertions), 76 JS tests; e2e in Chrome + 66 URLs at 390px |

### Launch status

**Live since 2026-10-19 at https://tinyknacks.com**: Cloudways server (own account) + Cloudflare Free (nameservers garrett/ollie.ns.cloudflare.com, records proxied, Google Workspace MX/SPF/DKIM kept) + Cloudflare Origin Certificate (valid to 2041, SSL Full strict) + GitHub Actions deploy on every push to `main` (with Cloudflare cache purge via `CF_ZONE_ID`/`CF_API_TOKEN`).

Still pending:

- Set `ADS_*` and `ANALYTICS_*` in production `.env` (privacy/terms pages already exist). In the EEA/UK, enable a Google-certified consent banner (CMP) in AdSense.
- Consider a Content-Security-Policy once the final ad/analytics domains are known.
- Remaining `docs/LAUNCH.md` steps (Spanish, for the owner): Cloudflare cache rule + Always Use HTTPS, then Search Console, GA4 and AdSense. Code is on GitHub: https://github.com/luismi97/mini-tools (branch `main`).
- After launch: verify the domain in Google Search Console and Bing Webmaster Tools (`SITE_*_VERIFICATION`), submit `/sitemap.xml`, request indexing of the home and top tools, and monitor Core Web Vitals.

## 14. MVP done when

Homepage, categories and all 5 tools work; each tool has its own SEO; ads and analytics toggle globally; sitemap works; responsive; no console errors; no PHP errors; client-side tools never upload unnecessarily; good Lighthouse performance; adding a 6th tool is easy.

## 15. Adding a new tool (checklist)

1. Add an entry to `database/seeders/ToolSeeder.php` (English name, slug, short/long description, SEO title/description, category, icon from `App\Support\Icons`, flags) and run `php artisan db:seed`.
2. Create `resources/views/tools/<slug>.blade.php` with `<x-tool-page>` (steps + FAQ in English).
2b. Add long-form content for the slug in `database/seeders/content/tools.php` (≥ 80 words, 2–3 `<h2>` sections, mention related tools by exact name) and steps/FAQ in `content/guides.php`.
2c. Add the full translation for every other locale in `database/seeders/content/{locale}/tools/*.php` (slug, name, descriptions, SEO, content, steps, faq), wrap all UI strings with `__()` / `$t()` and add the keys to `lang/{locale}.json` / `lang/js/{locale}.json`. Then `php artisan db:seed` and `php artisan seo:images`. `I18nTest` fails if anything is missing.
3. Create `resources/js/tools/<slug>.js` (auto-registered as a Vite entry) and pure logic in `resources/js/lib/` with tests in `tests/js/`.
4. Only if a backend is truly needed: add a route above the catch-all in `routes/web.php`, `Tools/<Name>Controller` + `Services/Tools/<Name>Service`, validation (MIME + size), and `throttle` middleware; pass `:client-side="false"` to `<x-tool-page>`.
5. Nothing to add in tests for basic coverage: `ToolPageTest` renders every seeded tool and checks SEO, FAQ, JSON-LD and the JS entry; it also fails if a view exists without a seeded tool. Keep `seo_description` ≤ 160 chars.
6. Run `php artisan test`, `npm run test:js`, `npm run build`, and check the page in a browser (desktop + 390px, light + dark, no console errors).
7. Update this file if anything changed.

## 16. Backlog (prioritize by real traffic data)

The original backlog is fully built. Suggested next tools (all client-side):
- Generators: Passphrase Generator, Dice Roller, Coin Flip, Barcode Generator.
- Developer: Markdown to HTML, YAML ↔ JSON, SQL Formatter, Cron Expression Explainer, HTML Entity Encoder, Slug Generator, QR Code Scanner.
- Image: Rotate & Flip Image, Image Color Picker, Favicon Generator, Remove EXIF/metadata.
- PDF: Watermark PDF, PDF to PNG, Sign PDF, Insert blank pages (avoid "Compress PDF": weak results in the browser).
- Calculators: Refinance, Loan Payoff / Extra Payment, Savings Goal, Retirement / 401(k), Margin & Markup, Sales Tax / VAT, ROI, GPA, Time Zone Converter, Ovulation Calculator, Body Fat Calculator.
- Image: AVIF to JPG, HEIC to PNG, PNG to ICO / Favicon Generator.
- Everyday: Countdown to a date, Word of the day-style flashcards (only if data proves demand).
Later: `/admin` (toggle tools, edit SEO, categories, order, ads), more languages by traffic data (candidates: Japanese — needs a CJK font for `seo:images`; Dutch, Polish, Turkish). Avoid RTL languages until the layout supports `dir="rtl"`.

## 17. Internationalization (i18n)

- **Locales**: `en` (default, root), `es` (`es-419` formatting), `pt` (Brazilian Portuguese, `pt-BR`, "você"), `fr` (`fr-FR`, "vous"), `de` (`de-DE`, informal "du"), `it` (`it-IT`, "tu"). Spanish and Portuguese copy target Latin America/Brazil; French/German/Italian copy targets Europe (A4, VAT, EUR, local tipping customs).
- **Config**: `config/locales.php` (per locale: prefix, hreflang, og locale, Intl locale, default `currency`, translated URL segments). `App\Support\Locales` reads it. Money calculators default to the locale currency: layout sets `window.__currency`, JS reads `localCurrency()` from `lib/i18n.js`, and Blade selects use `Locales::currencies([...])` (prepends the locale currency, e.g. BRL, when the list lacks it). Routes are registered once per locale (`routes/web.php`): names `home` / `es.home` …; middleware `locale:{code}` sets `app()->setLocale()`.
- **Helpers**: `lroute($name, $params, $locale)`; models have `url($locale)` and `localSlug($locale)`.
- **DB content**: base columns hold English; the `translations` JSON column holds `{locale: {field: value}}`. `HasTranslations` returns the current-locale value for `$translatable` fields (falls back to English). The `slug` attribute is never swapped (internal key). Source files: `database/seeders/content/{locale}/tools.php` (merges `tools/*.php`) and `categories.php`, loaded by `TranslationFiles`.
- **UI strings**: Blade/PHP `__('English text')` → `lang/{locale}.json`. JS `t()` / `tc()` / `intlLocale()` from `lib/i18n.js`; Alpine magics `$t` / `$tc`. Keys are the English text with `:placeholders`. Lib constants stay English and are translated at display time (`x-text="$t(meta.label)"`). The JS dictionary `lang/js/{locale}.json` is served by `TranslationController` at `/i18n/{locale}.js?v=hash` (immutable cache), loaded with `defer` before the Vite modules.
- **Pages**: `resources/views/pages/{locale}/{page}.blade.php`; localized slugs in `PageController::PAGES[...]['slugs']`.
- **SEO**: hreflang alternates + `x-default` (English), `og:locale(:alternate)`, `inLanguage` in schema, sitemap lists every page per locale with `xhtml:link` alternates. OG images: `images/og/{locale}/…` (default locale at `images/og/`). Language switcher: `<x-language-switcher>` (plain links, no auto-redirect by browser language).
- **Tests**: `tests/Feature/I18nTest.php` renders every page in every locale and fails on any missing `__()` key, checks JS literal keys, tool/category translations (slug, SEO lengths, content ≥ 80 words, steps/FAQ, OG images); `tests/js/i18n.test.js` checks dynamic labels.
- **Adding a language** (no code changes): add an entry to `config/locales.php` (including `currency`); create `lang/{code}.json`, `lang/js/{code}.json`, `database/seeders/content/{code}/tools.php` (+ `tools/*.php`) and `categories.php`, `resources/views/pages/{code}/*.blade.php`, add the page slugs in `PageController::PAGES`; then `php artisan db:seed`, `php artisan seo:images`, `php artisan test`, `npm run test:js`, and sweep every new URL at 390px (longer languages break fixed-width rows).
- **Language preference** (`lib/locale-pref.js`, all client-side so Cloudflare can keep caching HTML): English is always the default and nobody is redirected on a first visit (crawlers never are). If the browser language (`navigator.languages`) matches another version of the page, `<x-locale-suggestion>` shows a small banner written in that language ("View in Español" / "Not now"). Any explicit choice (banner or `a[data-locale]` switcher links) is stored in `localStorage['tk-locale']`; later visits arriving from outside the site are redirected before paint by an inline `<head>` script that mirrors `redirectTarget()`. Navigation inside the site never bounces. No cookies.
- **Mobile menu** (`<x-mobile-menu>`, below `lg`): native modal `<dialog>` sheet (focus trap, Escape, backdrop click, focus return, scroll lock via `html.overflow-hidden`): All tools, categories with counts, Suggest a tool, language grid (`<x-language-switcher variant="list">`). Below `sm` the header language dropdown is hidden and lives in the menu.
- **Writing translations**:
  - Never build a sentence from translated fragments (`"every :period"` + a noun). Use one key per whole sentence (see `FREQUENCIES[].summary` in `lib/loan.js`), because articles, gender and case differ per language.
  - Internal links match the tool name exactly (case-sensitive, after `e()`): in German write names uninflected, ideally in quotes („Bilder komprimieren“); in French/Italian use the typographic apostrophe ’ in names and copy (a straight `'` is escaped by `e()` and also needs `\'` in PHP strings).
  - French, German and Italian run 15–25% longer than English: aim for `seo_description` ≤ 150 chars and let toolbars/rows wrap (`flex-wrap`, `min-w-0`).
  - Dates in legal pages use the local format ("6. Oktober 2026", "6 octobre 2026").
