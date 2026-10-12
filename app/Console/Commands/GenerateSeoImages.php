<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Tool;
use App\Support\Locales;
use GdImage;
use Illuminate\Console\Command;

/**
 * Generates SEO images with GD:
 *  - Open Graph images (1200×630) for every tool and category → public/images/og/
 *  - Favicons, Apple touch icon, PWA icons and the Organization logo → public/
 *
 * Run locally after adding or renaming tools and commit the generated files:
 *   php artisan seo:images
 */
class GenerateSeoImages extends Command
{
    protected $signature = 'seo:images {--only= : Generate only "og" or "icons"}';

    protected $description = 'Generate Open Graph images, favicons and the site logo';

    private const W = 1200;

    private const H = 630;

    private const COLORS = [
        'paper' => '#f6f5f1',
        'ink' => '#17171b',
        'muted' => '#5f5f69',
        'line' => '#e2dfd7',
        'accent' => '#0f766e',
        'white' => '#ffffff',
    ];

    private string $bold;

    private string $regular;

    public function handle(): int
    {
        if (! extension_loaded('gd') || ! function_exists('imagettftext')) {
            $this->error('The GD extension with FreeType support is required.');

            return self::FAILURE;
        }

        [$this->bold, $this->regular] = $this->fonts();
        $only = $this->option('only');

        if ($only !== 'og') {
            $this->icons();
        }
        if ($only !== 'icons') {
            $this->ogImages();
        }

        return self::SUCCESS;
    }

    /* ------------------------------------------------------------ icons */

    private function icons(): void
    {
        $sizes = [
            'apple-touch-icon.png' => 180,
            'images/icon-192.png' => 192,
            'images/icon-512.png' => 512,
            'images/logo-512.png' => 512,
        ];
        foreach ($sizes as $path => $size) {
            imagepng($this->logoMark($size), public_path($path), 9);
            $this->line("  icon  {$path}");
        }

        // favicon.ico containing a 48×48 PNG (supported by all modern browsers and Google Search).
        ob_start();
        imagepng($this->logoMark(48), null, 9);
        $png = ob_get_clean();
        $ico = pack('vvv', 0, 1, 1).pack('CCCCvvVV', 48, 48, 0, 0, 1, 32, strlen($png), 22).$png;
        file_put_contents(public_path('favicon.ico'), $ico);
        $this->line('  icon  favicon.ico');

        file_put_contents(public_path('site.webmanifest'), json_encode([
            'name' => config('site.name'),
            'short_name' => config('site.name'),
            'description' => config('site.default_description'),
            'start_url' => '/',
            'display' => 'standalone',
            'background_color' => self::COLORS['paper'],
            'theme_color' => self::COLORS['ink'],
            'icons' => [
                ['src' => '/images/icon-192.png', 'sizes' => '192x192', 'type' => 'image/png'],
                ['src' => '/images/icon-512.png', 'sizes' => '512x512', 'type' => 'image/png'],
                ['src' => '/images/icon-512.png', 'sizes' => '512x512', 'type' => 'image/png', 'purpose' => 'maskable'],
            ],
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $this->line('  file  site.webmanifest');
    }

    /**
     * The Tiny Knacks symbol — same geometry as resources/views/components/logo-mark.blade.php
     * (32-unit grid): a "k" stem, a diagonal arm and a dot. Drawn at 4× and downsampled.
     */
    private function logoMark(int $size): GdImage
    {
        $s = $size * 4;
        $big = imagecreatetruecolor($s, $s);
        imagesavealpha($big, true);
        imagealphablending($big, false);
        imagefill($big, 0, 0, imagecolorallocatealpha($big, 0, 0, 0, 127));
        imagealphablending($big, true);

        $u = $s / 32;
        $white = $this->color($big, 'white');
        $this->roundedRect($big, 0, 0, $s, $s, (int) round(9 * $u), $this->color($big, 'accent'));
        $this->roundLine($big, 11.5 * $u, 8 * $u, 11.5 * $u, 24.5 * $u, 3.6 * $u, $white);   // stem
        $this->roundLine($big, 11.5 * $u, 19.5 * $u, 19.5 * $u, 11.5 * $u, 3.6 * $u, $white); // arm
        $d = (int) round(2.7 * 2 * $u);
        imagefilledellipse($big, (int) round(20.2 * $u), (int) round(21.6 * $u), $d, $d, $white);  // dot

        $out = imagecreatetruecolor($size, $size);
        imagesavealpha($out, true);
        imagealphablending($out, false);
        imagefill($out, 0, 0, imagecolorallocatealpha($out, 0, 0, 0, 127));
        imagecopyresampled($out, $big, 0, 0, 0, 0, $size, $size, $s, $s);

        return $out;
    }

    /* --------------------------------------------------------------- OG */

    /**
     * One set per locale: the default locale in images/og/, others in images/og/{locale}/
     * (see Seo::ogImage()). File names always use the internal (English) slug.
     */
    private function ogImages(): void
    {
        $previous = app()->getLocale();

        foreach (Locales::codes() as $locale) {
            app()->setLocale($locale); // translated model attributes and __() strings
            $default = Locales::isDefault($locale);
            $dir = public_path($default ? 'images/og' : "images/og/{$locale}");
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            foreach (Tool::with('category')->where('is_active', true)->get() as $tool) {
                $this->ogImage("{$dir}/{$tool->slug}.png", $tool->category->name, $tool->name, $tool->short_description);
                $this->line("  og    {$locale}  {$tool->slug}.png");
            }

            foreach (Category::where('is_active', true)->withCount('tools')->get() as $category) {
                $this->ogImage(
                    "{$dir}/category-{$category->slug}.png",
                    __(':count free tools', ['count' => $category->tools_count]),
                    $category->seoTitle(),
                    (string) $category->description,
                );
                $this->line("  og    {$locale}  category-{$category->slug}.png");
            }

            $defaultPath = $default ? public_path(config('site.og_image')) : "{$dir}/default.png";
            $this->ogImage($defaultPath, __('No sign-up · Private · Fast'), __('Free Online Tools'), __(config('site.tagline')));
            $this->line("  og    {$locale}  ".basename($defaultPath));
        }

        app()->setLocale($previous);
    }

    private function ogImage(string $path, string $kicker, string $title, string $subtitle): void
    {
        $im = imagecreatetruecolor(self::W, self::H);
        imagealphablending($im, true);
        imagefilledrectangle($im, 0, 0, self::W, self::H, $this->color($im, 'paper'));

        // Subtle grid frame.
        $line = $this->color($im, 'line');
        for ($x = 0; $x <= self::W; $x += 40) {
            imageline($im, $x, 0, $x, self::H, $line);
        }
        for ($y = 0; $y <= self::H; $y += 40) {
            imageline($im, 0, $y, self::W, $y, $line);
        }
        imagefilledrectangle($im, 60, 60, self::W - 60, self::H - 60, $this->color($im, 'paper'));

        // Brand.
        imagecopy($im, $this->logoMark(64), 100, 100, 0, 0, 64, 64);
        // Wordmark like the site header: "tiny" light + "knack" bold, one lowercase word.
        $parts = preg_split('/\s+/', trim(config('site.name')));
        $first = mb_strtolower(array_shift($parts));
        $rest = mb_strtolower(implode('', $parts));
        $box = imagettftext($im, 28, 0, 184, 145, $this->color($im, 'muted'), $this->regular, $first);
        imagettftext($im, 28, 0, $box[2] + 1, 145, $this->color($im, 'ink'), $this->bold, $rest);

        // Kicker, title and subtitle.
        imagettftext($im, 20, 0, 100, 250, $this->color($im, 'accent'), $this->bold, mb_strtoupper($kicker));
        $titleSize = mb_strlen($title) > 24 ? 54 : 66;
        $y = 250 + $titleSize + 28;
        foreach (array_slice($this->wrap($title, $this->bold, $titleSize, 1000), 0, 2) as $row) {
            imagettftext($im, $titleSize, 0, 96, $y, $this->color($im, 'ink'), $this->bold, $row);
            $y += (int) ($titleSize * 1.3);
        }
        // Subtitle: as many lines as fit above the footer (last visible line gets an ellipsis if cut).
        $rows = $this->wrap($subtitle, $this->regular, 26, 1000);
        $maxBaseline = self::H - 140;
        foreach ($rows as $i => $row) {
            if ($y + 6 > $maxBaseline) {
                break;
            }
            $isLastVisible = ($y + 46 > $maxBaseline) && isset($rows[$i + 1]);
            imagettftext($im, 26, 0, 100, $y + 6, $this->color($im, 'muted'), $this->regular, $isLastVisible ? rtrim($row, '.,').'…' : $row);
            $y += 40;
        }

        // Footer line.
        imagefilledrectangle($im, 100, self::H - 118, 260, self::H - 112, $this->color($im, 'accent'));
        imagettftext($im, 20, 0, 100, self::H - 80, $this->color($im, 'muted'), $this->regular, __('Free · No sign-up · Runs in your browser'));

        imagepng($im, $path, 9);
    }

    /* ---------------------------------------------------------- helpers */

    /** @return array{0: string, 1: string} bold and regular TrueType fonts */
    private function fonts(): array
    {
        $candidates = [
            ['C:/Windows/Fonts/segoeuib.ttf', 'C:/Windows/Fonts/segoeui.ttf'],
            ['/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf', '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf'],
            ['/System/Library/Fonts/Supplemental/Arial Bold.ttf', '/System/Library/Fonts/Supplemental/Arial.ttf'],
        ];
        foreach ($candidates as [$bold, $regular]) {
            if (is_file($bold) && is_file($regular)) {
                return [$bold, $regular];
            }
        }
        throw new \RuntimeException('No TrueType font found. Add one to GenerateSeoImages::fonts().');
    }

    /** @return string[] */
    private function wrap(string $text, string $font, int $size, int $maxWidth): array
    {
        $rows = [];
        $current = '';
        foreach (preg_split('/\s+/', trim($text)) as $word) {
            $try = $current === '' ? $word : "{$current} {$word}";
            $box = imagettfbbox($size, 0, $font, $try);
            if ($current !== '' && ($box[2] - $box[0]) > $maxWidth) {
                $rows[] = $current;
                $current = $word;
            } else {
                $current = $try;
            }
        }
        if ($current !== '') {
            $rows[] = $current;
        }

        return $rows;
    }

    private function color(GdImage $im, string $name): int
    {
        $hex = ltrim(self::COLORS[$name], '#');

        return imagecolorallocate($im, hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
    }

    /** A thick line with round caps (GD has no stroke caps): a quad plus two discs. */
    private function roundLine(GdImage $im, float $x1, float $y1, float $x2, float $y2, float $width, int $color): void
    {
        $len = hypot($x2 - $x1, $y2 - $y1);
        $nx = -($y2 - $y1) / $len * $width / 2;
        $ny = ($x2 - $x1) / $len * $width / 2;
        imagefilledpolygon($im, array_map('intval', array_map('round', [
            $x1 + $nx, $y1 + $ny, $x2 + $nx, $y2 + $ny, $x2 - $nx, $y2 - $ny, $x1 - $nx, $y1 - $ny,
        ])), $color);
        $d = (int) round($width);
        imagefilledellipse($im, (int) round($x1), (int) round($y1), $d, $d, $color);
        imagefilledellipse($im, (int) round($x2), (int) round($y2), $d, $d, $color);
    }

    private function roundedRect(GdImage $im, int $x, int $y, int $w, int $h, int $r, int $color): void
    {
        imagefilledrectangle($im, $x + $r, $y, $x + $w - $r - 1, $y + $h - 1, $color);
        imagefilledrectangle($im, $x, $y + $r, $x + $w - 1, $y + $h - $r - 1, $color);
        foreach ([[$x + $r, $y + $r], [$x + $w - $r - 1, $y + $r], [$x + $r, $y + $h - $r - 1], [$x + $w - $r - 1, $y + $h - $r - 1]] as [$cx, $cy]) {
            imagefilledellipse($im, $cx, $cy, $r * 2, $r * 2, $color);
        }
    }
}
