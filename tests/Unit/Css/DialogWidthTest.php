<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Tests\Support\CssTestSupport;

final class DialogWidthTest extends TestCase
{
    #[Test]
    public function fieldDialogUsesTheCapAndAShortDialogStaysCompact(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/dialog.css';
        self::assertFileExists($path);
        $css = CssTestSupport::normalizeSelectors((string) file_get_contents($path));
        $scss = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/scss/roles/dialog.scss');
        $cap = 'min(32rem, 100vw - 2 * var(--ui-space-lg))';

        self::assertStringContainsString('min(32rem, calc(100vw - 2 * var(--ui-space-lg)))', $scss);

        self::assertStringContainsString($cap, $css);
        self::assertStringContainsString('dialog.ui-dialog:has(input, textarea, select)', $css);
        self::assertStringContainsString('[data-ui-role="modal"]:has(input, textarea, select)', $css);
        self::assertStringContainsString(':has(input, textarea, select)', $css);
        self::assertMatchesRegularExpression('/:has\(input, textarea, select\)\s*\{[^}]*width:\s*' . preg_quote($cap, '/') . '/s', $css);
        self::assertStringContainsString('width: max-content', $css);
        self::assertMatchesRegularExpression('/input,\s*textarea,\s*select[\s\S]*width:\s*100%/', $css);
        self::assertMatchesRegularExpression('/input,\s*textarea,\s*select[\s\S]*box-sizing:\s*border-box/', $css);
    }
}
