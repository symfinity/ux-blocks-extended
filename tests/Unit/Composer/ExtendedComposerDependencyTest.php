<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Composer;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ExtendedComposerDependencyTest extends TestCase
{
    #[Test]
    public function extendedPackageDoesNotRequireForm(): void
    {
        /** @var array<string, mixed> $composer */
        $composer = json_decode(
            (string) file_get_contents(\dirname(__DIR__, 3) . '/composer.json'),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );

        $require = $composer['require'] ?? [];
        self::assertIsArray($require);
        self::assertArrayNotHasKey('symfinity/ux-blocks-form', $require);
    }
}
