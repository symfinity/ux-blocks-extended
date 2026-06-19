<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class DialogStartingStyleTest extends TestCase
{
    private static function dialogCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/dialog.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function dialogUsesStartingStyleAndAllowDiscrete(): void
    {
        $css = self::dialogCss();

        self::assertStringContainsString('@starting-style', $css);
        self::assertStringContainsString('allow-discrete', $css);
        self::assertStringContainsString('[data-ui-role="dialog"][open]', $css);
        self::assertStringContainsString('[data-ui-role="dialog"][open]::backdrop', $css);
    }

    #[Test]
    public function dialogSuppressesMotionUnderReducedMotion(): void
    {
        $css = self::dialogCss();

        self::assertStringContainsString('@media (prefers-reduced-motion: reduce)', $css);
        self::assertStringContainsString('transition: none', $css);
    }
}
