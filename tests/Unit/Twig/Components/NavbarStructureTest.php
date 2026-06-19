<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class NavbarStructureTest extends TestCase
{
    #[Test]
    public function navbarTemplateExposesStickyShellAndChromeParts(): void
    {
        $path = dirname(__DIR__, 4) . '/templates/components/Navbar.html.twig';
        self::assertFileExists($path);

        $twig = (string) file_get_contents($path);

        self::assertStringContainsString('data-ui-part="navbar-sticky"', $twig);
        self::assertStringContainsString('data-ui-part="navbar-chrome"', $twig);
        self::assertStringNotContainsString('data-controller', $twig);
    }
}
