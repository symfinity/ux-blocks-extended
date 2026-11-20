<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Docs;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PageHeaderUpgradeNoteTest extends TestCase
{
    #[Test]
    public function upgradeNoteNamesSectionHeadingAndTheFourParts(): void
    {
        $path = dirname(__DIR__, 3) . '/docs/upgrade.md';
        self::assertFileExists($path);
        $note = (string) file_get_contents($path);

        self::assertStringContainsString('SectionHeading', $note);
        self::assertMatchesRegularExpression('/level 1|level-1/i', $note);
        foreach (['title', 'description', 'breadcrumb', 'actions'] as $part) {
            self::assertStringContainsString($part, $note);
        }
    }
}
