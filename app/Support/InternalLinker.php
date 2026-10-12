<?php

namespace App\Support;

use App\Models\Tool;

/**
 * Turns plain-text mentions of other tools ("use Split PDF first") into links.
 *
 * - Only the first mention of each tool per page is linked (one instance per page).
 * - Text inside headings, links, code and other tags' attributes is never touched.
 * - The current tool is never linked to itself.
 */
class InternalLinker
{
    /** @var array<string, true> slugs already linked on this page */
    private array $linked = [];

    /** @var array<int, array{pattern: string, slug: string, url: string}> */
    private array $targets;

    public function __construct(?Tool $current = null)
    {
        $this->targets = Catalog::tools()
            ->reject(fn (Tool $t) => $current && $t->id === $current->id)
            // Longer names first so "JPG to PDF" wins over shorter overlapping names.
            ->sortByDesc(fn (Tool $t) => mb_strlen($t->name))
            ->map(fn (Tool $t) => [
                'pattern' => '/(?<![\p{L}\p{N}-])'.preg_quote(e($t->name), '/').'(?![\p{L}\p{N}-])/u',
                'slug' => $t->slug,
                'url' => $t->url(),
            ])
            ->values()
            ->all();
    }

    public function link(?string $html): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        $parts = preg_split('/(<[^>]+>)/', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        $skipDepth = 0;

        foreach ($parts as $i => $part) {
            if ($part === '') {
                continue;
            }
            if ($part[0] === '<') {
                if (preg_match('#^<(a|code|h1|h2|h3|h4|pre)\b#i', $part)) {
                    $skipDepth++;
                } elseif (preg_match('#^</(a|code|h1|h2|h3|h4|pre)>#i', $part)) {
                    $skipDepth = max(0, $skipDepth - 1);
                }

                continue;
            }
            if ($skipDepth === 0) {
                $parts[$i] = $this->linkText($part);
            }
        }

        return implode('', $parts);
    }

    private function linkText(string $text): string
    {
        foreach ($this->targets as $target) {
            if (isset($this->linked[$target['slug']])) {
                continue;
            }
            // Search only outside the links already inserted for longer names, so
            // "Loan Calculator" never matches inside "Auto Loan Calculator".
            $segments = preg_split('#(<a\b[^>]*>.*?</a>)#su', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
            foreach ($segments as $j => $segment) {
                if (str_starts_with($segment, '<a')) {
                    continue;
                }
                $count = 0;
                $segments[$j] = preg_replace_callback(
                    $target['pattern'],
                    fn ($m) => '<a href="'.e($target['url']).'">'.$m[0].'</a>',
                    $segment,
                    1,
                    $count,
                );
                if ($count) {
                    $this->linked[$target['slug']] = true;
                    break;
                }
            }
            $text = implode('', $segments);
        }

        return $text;
    }
}
