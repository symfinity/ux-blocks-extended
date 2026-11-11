<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Config;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class NavbarRoleAbsentTest extends TestCase
{
    #[Test]
    public function extendedRoleRegistryHasNoNavbarKey(): void
    {
        $yaml = (string) file_get_contents(dirname(__DIR__, 3).'/config/ux_roles.yaml');

        self::assertDoesNotMatchRegularExpression(
            '/^\\s*- role: navbar\\s*$/m',
            $yaml,
            'ux-blocks-extended still registers the navbar role',
        );
    }
}
