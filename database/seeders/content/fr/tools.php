<?php

/*
| French translations of every tool, keyed by the default (English) slug.
| Each entry: slug (localized URL), name, short_description, description,
| seo_title (≤ 60 chars), seo_description (≤ 160 chars), content (HTML),
| steps and faq. Split by category in content/fr/tools/*.php.
|
| Mentions of other tools must use their exact French name so
| App\Support\InternalLinker can link them. Tool names use the typographic
| apostrophe (’), never ', because the linker matches the HTML-escaped name.
*/

return array_merge(...array_map(
    fn (string $file) => require $file,
    glob(__DIR__.'/tools/*.php'),
));
