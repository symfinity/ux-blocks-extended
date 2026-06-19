<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ContainerStyleQueryTest extends TestCase
{
    private static function roleCss(string $role): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/' . $role . '.css';
        self::assertFileExists($path, $role);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function cardExposesDensityAndThemeVariantStyleQueries(): void
    {
        $css = self::roleCss('card');

        self::assertStringContainsString('--ui-density: comfortable', $css);
        self::assertStringContainsString('--ui-theme-variant: default', $css);
        self::assertStringContainsString('@container blocks-card style(--ui-density: compact)', $css);
        self::assertStringContainsString('@container blocks-card style(--ui-theme-variant: emphasis)', $css);
        self::assertStringContainsString('@supports not (container-type: style)', $css);
    }

    #[Test]
    public function bentoViewportExposesDensityStyleQueriesOnLinks(): void
    {
        $css = self::roleCss('bento-box-panel');

        self::assertStringContainsString('--ui-density: comfortable', $css);
        self::assertStringContainsString('@container bento-box-panel style(--ui-density: compact)', $css);
        self::assertStringContainsString('[data-ui-part="bento-box-panel-links"]', $css);
    }
}
