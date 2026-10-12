<?php

/*
| German translations of every tool, keyed by the default (English) slug.
| Each entry: slug (localized URL), name, short_description, description,
| seo_title (≤ 60 chars), seo_description (≤ 160 chars), content (HTML),
| steps and faq. Split by category in content/de/tools/*.php. Informal "du".
|
| Mentions of other tools must use their exact German name (no inflection,
| e.g. „Bilder komprimieren“) so App\Support\InternalLinker can link them.
*/

return array_merge(...array_map(
    fn (string $file) => require $file,
    glob(__DIR__.'/tools/*.php'),
));
