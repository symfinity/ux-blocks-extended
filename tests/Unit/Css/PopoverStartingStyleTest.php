<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PopoverStartingStyleTest extends TestCase
{
    private static function popoverCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/popover.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function popoverUsesStartingStyleOnPopoverOpen(): void
    {
        $css = self::popoverCss();

        self::assertStringContainsString('@starting-style', $css);
        self::assertStringContainsString(':popover-open[data-ui-role="popover"]', $css);
        self::assertStringContainsString('allow-discrete', $css);
    }

    #[Test]
    public function popoverSuppressesMotionUnderReducedMotion(): void
    {
        $css = self::popoverCss();

        self::assertStringContainsString('@media (prefers-reduced-motion: reduce)', $css);
    }
}
