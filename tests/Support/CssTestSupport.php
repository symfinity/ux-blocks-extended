<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Support;

/**
 * Normalizes SCSS-compiled attribute selectors to quoted form for stable PHPUnit assertions.
 */
final class CssTestSupport
{
    public static function normalizeSelectors(string $css): string
    {
        $normalized = preg_replace(
            '/\[(data-ui-[a-z-]+)=([^\]"=\s][^\]"]*)\]/',
            '[$1="$2"]',
            $css,
        );

        return $normalized ?? $css;
    }
}
