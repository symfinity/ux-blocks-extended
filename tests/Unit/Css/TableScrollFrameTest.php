<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Tests\Support\CssTestSupport;

final class TableScrollFrameTest extends TestCase
{
    #[Test]
    public function scrollFrameClipsOverflowAndTheTableKeepsItsContainer(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/table.css';
        self::assertFileExists($path);
        $css = CssTestSupport::normalizeSelectors((string) file_get_contents($path));

        self::assertMatchesRegularExpression(
            '/\[data-ui-part="scroll-frame"\]\s*\{[^}]*overflow-x:\s*auto[^}]*\}/s',
            $css,
        );
        self::assertMatchesRegularExpression(
            '/\[data-ui-part="scroll-frame"\]\s*\{[^}]*max-width:\s*100%[^}]*\}/s',
            $css,
        );
        self::assertMatchesRegularExpression(
            '/\[data-ui-part="scroll-frame"\]\s*\{[^}]*min-width:\s*0[^}]*\}/s',
            $css,
        );
        self::assertStringContainsString('container-type', $css);
        self::assertStringContainsString('container-name', $css);
        self::assertDoesNotMatchRegularExpression(
            '/\[data-ui-part="scroll-frame"\][^{]*\{[^}]*container-type/s',
            $css,
        );
    }
}
