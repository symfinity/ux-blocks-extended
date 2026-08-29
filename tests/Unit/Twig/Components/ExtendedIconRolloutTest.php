<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksExtended\Tests\Integration\UxBlocksExtendedTestKernel;

final class ExtendedIconRolloutTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksExtendedTestKernel::class;
    }

    #[Test]
    public function statRendersLockedEndIcon(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Stat', [
            'icon' => 'lucide:trending-up',
            'iconPosition' => 'start',
        ], '42');

        self::assertStringContainsString('data-ui-part="icon"', $html);
        self::assertMatchesRegularExpression('/data-ui-part="stat-body"[\s\S]*data-ui-part="icon"/', $html);
    }

    #[Test]
    public function navbarRendersBrandStartIcon(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Navbar', [
            'icon' => 'lucide:layers',
        ], 'Acme');

        self::assertStringContainsString('data-ui-part="navbar-brand"', $html);
        self::assertMatchesRegularExpression('/data-ui-part="icon"[\s\S]*Acme/', $html);
    }
}
