<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TableSubgridTest extends TestCase
{
    private static function tableCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/table.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function tableRoleDeclaresSubgridInsideSupports(): void
    {
        $css = self::tableCss();

        self::assertStringContainsString('@supports (grid-template-columns: subgrid)', $css);
        self::assertStringContainsString('grid-template-columns: subgrid', $css);
        self::assertStringContainsString('[data-ui-role="table"] thead', $css);
        self::assertStringContainsString('[data-ui-role="table"] tbody', $css);
        self::assertStringContainsString('[data-ui-role="table"] tr', $css);
    }

    #[Test]
    public function tableRoleShipsFallbackOutsideSubgrid(): void
    {
        $css = self::tableCss();

        self::assertStringContainsString('@supports not (grid-template-columns: subgrid)', $css);
        self::assertStringContainsString('display: table', $css);
    }

    #[Test]
    public function tableRoleUsesNarrowOverflowShell(): void
    {
        $css = self::tableCss();

        self::assertStringContainsString('container-name: blocks-table', $css);
        self::assertStringContainsString('@container blocks-table (max-width: 22rem)', $css);
        self::assertStringContainsString('overflow-x: auto', $css);
    }
}
