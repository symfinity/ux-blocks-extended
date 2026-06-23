<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksExtended\Tests\Integration\UxBlocksExtendedTestKernel;

final class CardWatermarkTest extends KernelTestCase
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
        $html = (string) $this->renderTwigComponent('Card', [
            'title' => 'Card title',
        ]);

        self::assertStringNotContainsString('data-ui-part="icon-watermark"', $html);
    }

    #[Test]
    public function itRendersCenterWatermarkPosition(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Card', [
            'title' => 'Card title',
            'iconWatermark' => 'lucide:sparkles',
            'watermarkPosition' => 'center',
        ]);

        self::assertStringContainsString('data-ui-part="icon-watermark"', $html);
        self::assertStringContainsString('data-ui-watermark-position="center"', $html);
        self::assertStringContainsString('aria-hidden="true"', $html);
    }

    #[Test]
    public function itDefaultsWatermarkToBottomEnd(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Card', [
            'iconWatermark' => 'lucide:sparkles',
        ]);

        self::assertStringContainsString('data-ui-watermark-position="bottom-end"', $html);
    }

    #[Test]
    public function headlessKernelRendersWatermarkWithoutUxIcons(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Card', [
            'iconWatermark' => 'lucide:sparkles',
        ]);

        self::assertStringContainsString('data-ui-part="icon-watermark"', $html);
        self::assertStringNotContainsString('data-controller', $html);
    }
}
