<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ComposerRequiresFormTest extends TestCase
{
    #[Test]
    public function productionRequireIncludesUxBlocksForm(): void
    {
        $composer = json_decode(
            (string) file_get_contents(\dirname(__DIR__, 2) . '/composer.json'),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );

        self::assertArrayHasKey('symfinity/ux-blocks-form', $composer['require'] ?? []);
    }
}
