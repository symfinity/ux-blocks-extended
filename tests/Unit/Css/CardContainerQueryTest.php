<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Tests\Support\CssTestSupport;

final class CardContainerQueryTest extends TestCase
{
    private static function cardCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/card.css';
        self::assertFileExists($path);

        return CssTestSupport::normalizeSelectors((string) file_get_contents($path));
    }

    #[Test]
    public function cardRoleDeclaresNamedContainer(): void
    {
        $css = self::cardCss();

        self::assertStringContainsString('[data-ui-role="card"]', $css);
        self::assertStringContainsString('container-type: inline-size', $css);
        self::assertStringContainsString('container-name: blocks-card', $css);
    }

    #[Test]
    public function cardLayoutUsesHorizontalBreakpoint(): void
    {
        $css = self::cardCss();

        self::assertStringContainsString('[data-ui-role="card"]', $css);
        self::assertStringContainsString('[data-ui-part="media"]', $css);
        self::assertStringContainsString('@container blocks-card (max-width: 22rem)', $css);
        self::assertStringContainsString('@container blocks-card (min-width: 22.01rem)', $css);
        self::assertStringContainsString('[data-ui-layout="horizontal"]', $css);
    }
}
