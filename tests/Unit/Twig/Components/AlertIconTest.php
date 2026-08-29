<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksExtended\Tests\Integration\UxBlocksExtendedTestKernel;

final class AlertIconTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksExtendedTestKernel::class;
    }

    #[Test]
    public function itRendersLockedStartIconSlot(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', ['variant' => 'warning']);

        self::assertStringContainsString('data-ui-part="icon"', $html);
        self::assertStringContainsString('data-ui-role="alert"', $html);
    }

    #[Test]
    public function headlessKernelRendersEmptyIconPartWithoutUxIcons(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'info',
            'icon' => 'lucide:info',
        ]);

        self::assertStringContainsString('data-ui-part="icon"', $html);
    }

    #[Test]
    public function itEmitsGlassSurfaceAttributeWhenRequested(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'success',
            'surface' => 'glass',
        ]);

        self::assertStringContainsString('data-ui-surface="glass"', $html);
        self::assertStringNotContainsString('data-ui-surface="solid"', $html);
    }

    #[Test]
    public function itRendersDismissControlWhenDismissible(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'info',
            'dismissible' => true,
        ]);

        self::assertStringContainsString('data-ui-role="alert-dismiss"', $html);
    }

    #[Test]
    public function itOmitsDismissControlWhenNotDismissible(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'info',
            'dismissible' => false,
        ]);

        self::assertStringNotContainsString('data-ui-role="alert-dismiss"', $html);
    }

    #[Test]
    public function legacyDestructivePropNormalizesToDangerOnDom(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Alert', [
            'variant' => 'destructive',
        ]);

        self::assertStringContainsString('data-ui-variant="danger"', $html);
        self::assertStringNotContainsString('data-ui-variant="destructive"', $html);
    }
}
