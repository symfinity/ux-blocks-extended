<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class BentoBoxPanelContainerRegressionTest extends TestCase
{
    private static function bentoCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/bento-box-panel.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function viewportHookRemainsOnlyQueryContainer(): void
    {
        $css = self::bentoCss();

        self::assertStringContainsString('[data-ui-part="bento-box-panel-viewport"]', $css);
        self::assertStringContainsString('container-type: inline-size', $css);
        self::assertStringContainsString('container-name: bento-box-panel', $css);
    }

    #[Test]
    public function bentoUsesTwentyTwoAndFortyEightRemBreakpoints(): void
    {
        $css = self::bentoCss();

        self::assertStringContainsString('@container bento-box-panel (min-width: 48rem)', $css);
        self::assertStringContainsString('@container bento-box-panel (max-width: 22rem)', $css);
    }

    #[Test]
    public function bentoGridRootDoesNotReceiveContainerType(): void
    {
        $css = self::bentoCss();

        preg_match(
            '/\[data-ui-role="bento-box-panel"\]\[data-ui-panel-layout="bento-box"\]\s*\{[^}]+\}/s',
            $css,
            $matches,
        );
        self::assertNotEmpty($matches[0] ?? null);
        self::assertStringNotContainsString('container-type', $matches[0]);
    }

    #[Test]
    public function bentoBoxesUseBorderBoxAndClampToColumn(): void
    {
        $css = self::bentoCss();

        self::assertStringContainsString('[data-ui-role="bento-box-panel-box"]', $css);
        self::assertStringContainsString('box-sizing: border-box', $css);
        self::assertStringContainsString('max-width: 100%', $css);
        self::assertStringContainsString('overflow: hidden', $css);
    }

    #[Test]
    public function bentoUsesOneRemGapTokenEverywhere(): void
    {
        $css = self::bentoCss();

        self::assertStringContainsString('--ux-bento-gap: 1rem', $css);
        self::assertStringContainsString('gap: var(--ux-bento-gap)', $css);
        self::assertStringContainsString('padding: var(--ux-bento-gap)', $css);
    }

    #[Test]
    public function bentoTwoColumnBandPlacesColumnWrappersOnTwoByTwoGrid(): void
    {
        $css = self::bentoCss();

        self::assertStringContainsString('@container bento-box-panel (min-width: 22.01rem) and (max-width: 47.99rem)', $css);
        self::assertStringContainsString('[data-ui-part="bento-box-panel-column"][data-ui-column="1"]', $css);
        self::assertStringContainsString('[data-ui-part="bento-box-panel-column"][data-ui-column="4"]', $css);
        self::assertStringContainsString('grid-row: 2', $css);
    }

    #[Test]
    public function bentoNarrowBandFlattensColumnsForSingleColumnStack(): void
    {
        $css = self::bentoCss();

        self::assertStringContainsString('@container bento-box-panel (max-width: 22rem)', $css);
        self::assertStringContainsString('display: contents', $css);
        self::assertStringContainsString('grid-column: 1;', $css);
    }
}
