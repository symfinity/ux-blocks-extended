<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksExtended\Tests\Integration\UxBlocksExtendedTestKernel;

final class DataTableChromeSurfaceTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksExtendedTestKernel::class;
    }

    #[Test]
    public function itEmitsGlassSurfaceOnToolbarWhenRequested(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('DataTableChrome', [
            'surface' => 'glass',
        ]);

        self::assertStringContainsString('data-ui-role="data-table-chrome-toolbar"', $html);
        self::assertMatchesRegularExpression(
            '/data-ui-role="data-table-chrome-toolbar"[^>]*data-ui-surface="glass"/',
            $html,
        );
    }
}
