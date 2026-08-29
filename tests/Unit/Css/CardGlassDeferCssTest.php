<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CardGlassDeferCssTest extends TestCase
{
    private static function roleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/card.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function solidBackgroundSkipsGlassSurface(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString(':not([data-ui-surface=glass])', $css);
        self::assertStringContainsString('background: var(--ui-color-surface-elevated)', $css);
    }

    #[Test]
    public function hoverLiftUsesPhysicsToken(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString('translateY(var(--ui-physics-hover-lift))', $css);
    }
}
