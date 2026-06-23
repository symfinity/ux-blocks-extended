<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ContainerRegionLayoutTest extends TestCase
{
    /** @return array<string, string> */
    private static function roleCssMap(): array
    {
        $base = dirname(__DIR__, 3) . '/assets/styles/roles/';

        return [
            'card' => $base . 'card.css',
            'empty' => $base . 'empty.css',
            'alert' => $base . 'alert.css',
        ];
    }

    #[Test]
    public function cardPositionsUniversalRegionParts(): void
    {
        $css = (string) file_get_contents(self::roleCssMap()['card']);

        foreach (['header', 'footer', 'media', 'actions'] as $part) {
            self::assertStringContainsString('[data-ui-part="' . $part . '"]', $css, $part);
        }

        self::assertStringNotContainsString('card-header', $css);
        self::assertStringNotContainsString('card-layout', $css);
    }

    #[Test]
    public function emptyPositionsUniversalRegionParts(): void
    {
        $css = (string) file_get_contents(self::roleCssMap()['empty']);

        foreach (['header', 'media', 'actions'] as $part) {
            self::assertStringContainsString('[data-ui-part="' . $part . '"]', $css, $part);
        }

        self::assertStringContainsString('[data-ui-appearance="soft"]', $css);
        self::assertStringContainsString('[data-ui-variant="icon"]', $css);
        self::assertStringNotContainsString('empty-header', $css);
        self::assertStringNotContainsString('empty-media', $css);
    }

    #[Test]
    public function alertPositionsHeaderAndActionsParts(): void
    {
        $css = (string) file_get_contents(self::roleCssMap()['alert']);

        self::assertStringContainsString('[data-ui-part="header"]', $css);
        self::assertStringContainsString('[data-ui-part="actions"]', $css);
    }

    #[Test]
    public function alertClipsIconWatermarksToPaddingBox(): void
    {
        $css = (string) file_get_contents(self::roleCssMap()['alert']);

        self::assertMatchesRegularExpression(
            '/\[data-ui-role="alert"\][^{]*\{[^}]*overflow:\s*hidden/s',
            $css,
        );
    }

    #[Test]
    public function fieldPositionsHeaderAndFooterParts(): void
    {
        self::markTestSkipped('field CSS moved to symfinity/ux-blocks-form (110).');
    }
}
