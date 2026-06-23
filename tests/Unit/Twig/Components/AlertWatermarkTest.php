<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksExtended\Tests\Integration\UxBlocksExtendedTestKernel;

final class AlertWatermarkTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksExtendedTestKernel::class;
    }

    #[Test]
    public function itOmitsWatermarkPartWhenPropUnset(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', ['variant' => 'info']);

        self::assertStringNotContainsString('data-ui-part="icon-watermark"', $html);
    }

    #[Test]
    public function itRendersWatermarkWithDefaultTopStartPosition(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'info',
            'iconWatermark' => 'lucide:sparkles',
        ]);

        self::assertStringContainsString('data-ui-part="icon-watermark"', $html);
        self::assertStringContainsString('data-ui-watermark-position="top-start"', $html);
        self::assertStringContainsString('aria-hidden="true"', $html);
        self::assertStringContainsString('data-ui-part="icon"', $html);
    }

    #[Test]
    public function headlessKernelRendersWatermarkWithoutUxIcons(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'warning',
            'iconWatermark' => 'lucide:sparkles',
        ]);

        self::assertStringContainsString('data-ui-part="icon-watermark"', $html);
    }
}
