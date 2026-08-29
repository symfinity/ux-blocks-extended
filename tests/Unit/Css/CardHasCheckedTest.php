<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Tests\Support\CssTestSupport;

final class CardHasCheckedTest extends TestCase
{
    private static function roleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/card.css';
        self::assertFileExists($path);

        return CssTestSupport::normalizeSelectors((string) file_get_contents($path));
    }

    #[Test]
    public function cardSelectedSurfaceUsesHasCheckedSelectors(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString(':has(input:checked)', $css);
        self::assertStringContainsString(':has([aria-checked=true])', $css);
    }

    #[Test]
    public function cardHoverRevealPairsHoverMediaWithFocusVisible(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString('@media (hover: hover)', $css);
        self::assertStringContainsString(':has(:focus-visible)', $css);
        self::assertStringContainsString('[data-ui-part="actions"]', $css);
    }
}
