# Mistakes Log

Every mistake made while building this project is recorded here so it is never repeated.
Read this file before starting any feature or change.

Format for each entry:

```text
## YYYY-MM-DD — Short title
- What happened:
- Root cause:
- Fix applied:
- Prevention rule:
```

---

## 2026-10-06 — Removed an npm package without checking its imports
- What happened: uninstalled `axios`, but `resources/js/bootstrap.js` still imported it, so `npm run build` failed (unresolved import).
- Root cause: removed a dependency without searching the codebase for usages first.
- Fix applied: deleted `bootstrap.js` (axios is not needed in this project) and its import in `app.js`.
- Prevention rule: before removing any dependency (npm or composer), grep `resources/`, `app/`, `config/` and build configs for imports/usages, then run the build.

## 2026-10-06 — Writing several source files through one Bash heredoc
- What happened: a single Bash command with several `cat > file <<'EOF'` blocks of PHP failed with "unexpected EOF while looking for matching quote"; no file was written.
- Root cause: the Windows Bash tool mis-parses long multi-heredoc commands containing quotes/apostrophes.
- Fix applied: rewrote the files with the Write tool.
- Prevention rule: create/replace source files with the Write tool (one file per call); use Bash only for commands, never as a multi-file writer.

## 2026-10-06 — Regex edit of nested HTML broke the markup
- What happened: a `perl` non-greedy regex meant to wrap a `<div class="panel">` block stopped at the first inner `</div>`, leaving the Blade `@if` and divs mismatched.
- Root cause: used regex for a structural edit of nested markup.
- Fix applied: repaired the block manually with the Edit tool.
- Prevention rule: never use sed/perl regex for multi-line or nested HTML/Blade edits; use the Edit tool with the exact old block.

## 2026-10-06 — REPEATED: structural sed edit on a JS file (rule already existed)
- What happened: used a multi-pattern `sed` to wrap an Alpine factory in a closure (`pdf-to-jpg.js`). Patterns containing `\n` silently did not match, leaving a stray `doc: null,`, broken indentation and a wrong closing `}));`.
- Root cause: ignored the existing rule "never use sed/perl regex for multi-line or structural edits" because the change looked mechanical.
- Fix applied: rewrote the whole file with the Write tool.
- Prevention rule: the rule applies to ALL languages (JS, PHP, Blade), not only HTML. Structural change = Edit tool or full rewrite with Write. `sed` only for single-line, literal, global replacements (e.g. renaming a class), followed by a grep to verify.

## 2026-10-06 — Placeholder brand and logo resembled an existing site
- What happened: the site was built as "Mini Tools" (from the plan title) with a 2×2-squares logo. An existing site, minitools.space ("MiniTools", 873 tools), uses a nearly identical name and a similar 2×2 logo.
- Root cause: no competitor/domain check before creating brand assets (name, logo, OG images).
- Fix applied: rebranded to "Tab Pantry" (tabpantry.com was unregistered per Verisign RDAP), new tab-and-shelves logo, regenerated all images.
- Prevention rule: before designing any brand asset, search for existing products with that name/look and check domain availability (RDAP: `https://rdap.verisign.com/com/v1/domain/<name>.com`, 404 = free).

## 2026-10-06 — Recommended a brand name and logo without real evaluation
- What happened: recommended "Tab Pantry" mainly because the .com was free, and shipped a detailed "tab with shelves and jars" logo. The user found the logo ugly; on review the name was ambiguous ("pantry" = food, Google shows food banks, does not suggest tools).
- Root cause: optimized for domain availability instead of brand quality; designed the logo directly in code without comparing concepts or testing at small sizes.
- Fix applied: evaluated names against explicit criteria and a web search, chose "Tiny Knack"; built 3 logo concepts, rendered them at 16/32/64/180 px on light and dark, picked the simplest legible one.
- Prevention rule: for any brand decision, state criteria (meaning, ambiguity, SERP for the exact name, spelling, competitors, domain) and check each candidate before recommending. For logos, always prototype several concepts and review them rendered at real sizes before implementing.

## 2026-10-06 — REPEATED: wrote a script file through a Bash heredoc
- What happened: wrote `shotfile.mjs` with `cat <<'EOF'`; the backslashes in a regex were mangled and Node failed with a syntax error.
- Root cause: ignored the existing rule (files go through the Write tool) because the script was "only for the scratchpad".
- Fix applied: rewrote it with the Write tool.
- Prevention rule: the Write-tool rule applies to every file, including scratchpad scripts.

## 2026-10-06 — `php artisan serve` kept the old APP_NAME after editing .env
- What happened: after changing `APP_NAME`, tests passed but the running dev server still rendered "Mini Tools".
- Root cause: `artisan serve` copies `.env` into the server process environment at start; later `.env` edits are ignored until restart.
- Fix applied: restarted the server and verified the `<title>` over HTTP.
- Prevention rule: after any `.env` change, restart `php artisan serve` (and run `php artisan config:clear`), then verify in the browser — passing tests do not prove the running server picked it up.

## 2026-10-06 — `&quot;` used inside an HTML attribute in FAQ/steps copy
- What happened: in text-compare's "How to use" step I wrote `<span class=&quot;...&quot;>`. Rendered with `{!! !!}`, the entity becomes a stray quote and breaks the `class` attribute.
- Root cause: my own CLAUDE.md convention said "write `\"` as `&quot;`" without limiting it to visible text.
- Fix applied: used `class=\'...\'` (escaped single quotes) and clarified the convention in CLAUDE.md.
- Prevention rule: `&quot;` only for visible text. HTML attributes inside PHP single-quoted strings use `\'`. When writing a convention, state where it does NOT apply.

## 2026-10-06 — sed ate the backslashes of a PHP namespace
- What happened: a `sed` replacement inserting `\App\Http\Controllers\PageController::url()` produced `AppHttpControllersPageController` (backslashes consumed by shell + sed escaping).
- Root cause: used sed for text containing backslashes.
- Fix applied: corrected both lines with the Edit tool (caught by the grep right after the sed).
- Prevention rule: never use sed for replacements whose text contains backslashes (PHP namespaces, regexes, Windows paths). Use the Edit tool.

## 2026-10-06 — REPEATED: loose Playwright selectors in scratch tests
- What happened: in the batch-5 checks, `has-text("Male")` also matched "Female", `p:has-text("Basal metabolic")` matched SEO copy, and `ol li` counted breadcrumb/steps items as laps.
- Root cause: wrote quick checks with substring text selectors again, despite the existing rule.
- Fix applied: `getByRole(..., { exact: true })` and container-scoped selectors.
- Prevention rule: in browser checks use ids, `getByRole` with `exact: true`, or selectors scoped to the tool container (`[x-data="…"] …`). Never a bare `p:has-text()` / `ol li` on a page that has How-to/FAQ copy.

## 2026-10-06 — Ambiguous browser-test selector produced a false bug
- What happened: a Playwright check used `text=Biweekly`, which matched FAQ copy ("paying biweekly") before the radio label, so the calculator looked broken.
- Root cause: loose, case-insensitive text selectors on pages full of SEO copy (How to use / FAQ repeat the UI words).
- Fix applied: scoped the selector (`fieldset label:has-text("Biweekly")`).
- Prevention rule: in browser checks, always scope selectors to the tool UI (ids, roles, or a container) and inspect Alpine state before concluding there is a bug.

## 2026-10-06 — PHP double-quoted string interpolated a JS template literal
- What happened: a scratch replacement spec (PHP array) held a JS snippet with `${name}` inside a double-quoted PHP string; PHP tried to interpolate it and the script died (nothing was written).
- Root cause: double quotes in PHP interpolate `$var` and `${var}`.
- Fix applied: made that change with the Edit tool.
- Prevention rule: in PHP strings that contain `$` (JS template literals, Blade variables), use single quotes or nowdoc (`<<<'TXT'`). Double quotes only when no `$` is present.

## 2026-10-06 — REPEATED: sed with backslashes (regex inside a scratch script)
- What happened: used `sed -i` to insert `(?<![\w.])` into a PHP regex; sed ate the backslash (`[w.]`).
- Root cause: ignored the existing rule "never use sed for text containing backslashes" because the target was a scratch file.
- Fix applied: corrected with the Edit tool.
- Prevention rule: the sed/backslash rule applies to EVERY file, scratch scripts included. Any replacement whose old or new text contains `\` goes through Edit (or the literal repl2.php spec format).

## 2026-10-06 — REPEATED: Bash heredoc for a script containing backslashes
- What happened: wrote a scratch PHP script through `cat > file <<'EOF'`; its regex backslashes arrived mangled and every preg call failed (dry run, nothing written).
- Root cause: ignored the existing rule about heredocs mangling backslashes in this environment.
- Fix applied: rewrote the script with the Write tool.
- Prevention rule: any file containing `\` (scripts, regexes, PHP) is created with the Write tool. Heredocs only for plain prose (e.g. appending to MISTAKES.md).

## 2026-10-08 — InternalLinker nested links when tool names overlap
- What happened: with "Auto Loan Calculator" already linked, the shorter "Loan Calculator" matched again inside that new `<a>`, producing `<a>Auto <a>Loan Calculator</a></a>` (invalid HTML, existed since the linker was written; found while adding French "Simulateur de prêt" / "Simulateur de prêt immobilier").
- Root cause: each name was replaced on the whole text segment, including anchors inserted by earlier (longer) names.
- Fix applied: `linkText()` splits the segment on already-inserted `<a>…</a>` and only replaces outside them; test `internal links are never nested when tool names overlap`.
- Prevention rule: sequential regex replacements that insert markup must skip the markup they already inserted. Whenever names can contain each other, add a test with both names in one sentence.

## 2026-10-08 — Footer language switcher overflowed every page at 390px
- What happened: with 6 languages the inline switcher (`flex` without wrap) became ~400px wide and every page scrolled horizontally by 13–14px, in all locales.
- Root cause: the component was designed and checked with 2 languages only; its width grows with `config/locales.php`.
- Fix applied: `flex flex-wrap max-w-xs` on the inline switcher.
- Prevention rule: any row whose item count comes from config/data (locales, categories, tools) must wrap. After adding config entries, re-run the 390px sweep on all pages, not only the new ones.

## 2026-10-08 — Fixed-width rows broke with longer German labels
- What happened: on /de the text-tool result toolbar ("Tauschen · Kopieren · Herunterladen") was clipped, and the timestamp result rows (label + 13-digit value + "Kopieren") widened the page.
- Root cause: `flex` rows without `flex-wrap`, and a `<dd>` without `min-w-0`, sized for English word lengths.
- Fix applied: wrapping toolbars (`flex-wrap`, `ml-auto`) in `<x-text-tool>`; `grid-cols-1`, `min-w-0` and `break-all` in the timestamp view.
- Prevention rule: rows mixing labels and buttons must wrap or shrink (`flex-wrap` / `min-w-0`); German is the stress test for widths.

## 2026-10-08 — Sentence assembled from a translated noun ("every :period")
- What happened: the loan summary ":count payments, every :period" rendered "60 Raten, alle Monat" (German) and "toutes les mois" (French).
- Root cause: the sentence was built from a translated fragment; articles/gender/plural depend on the noun.
- Fix applied: one whole-sentence key per frequency (`FREQUENCIES[].summary`), translated in every dictionary.
- Prevention rule: never compose a translatable sentence from separately translated words; one key per complete variant.

## 2026-10-19 — First Cloudways deploy failed in rsync
- What happened: the "Upload to Cloudways" step failed although almost every file was copied; the migrate/seed step never ran.
- Root cause: `rsync -a --chmod=...` tried to set permissions and times on `public_html/` and `public_html/public/`, which Cloudways creates owned by the app user (`abbufjefmy`), not by the master user that deploys. rsync exits 23 on those failures.
- Fix applied: `rsync -rltz --omit-dir-times --delete` (no permission changes, no directory times).
- Prevention rule: on shared-ownership targets never use `-a`/`--chmod` with rsync; check the ownership of the target directories (`ls -la`) before writing a deploy script. Also: in GitHub Actions, a gate variable (`vars.X`) must be a *repository* variable — environment variables are not visible in a job-level `if`.

## 2026-10-23 — Deploy failed: chmod on files owned by the app user

- **What happened**: "Run Laravel deploy commands" failed. `chmod -R ug+rwX storage …` hit cache files in `storage/framework/cache/data/` created by PHP (app user `yyyrsdhezx`), not by the SSH deploy user (`master_…`); `chmod` on another user's file fails and `set -e` aborted the script. Earlier deploys passed only because the cache was still empty.
- **Root cause**: on Cloudways the SSH user and the PHP-FPM user are different (shared group `www-data`).
- **Rule**: in deploy scripts, never `chmod`/`chown` recursively over runtime folders; limit it to files the deploy user owns (`find … -user "$(whoami)" -exec chmod …`). After editing the server `.env`, run `php artisan optimize` and purge Cloudflare, or the old cached config keeps being served.
