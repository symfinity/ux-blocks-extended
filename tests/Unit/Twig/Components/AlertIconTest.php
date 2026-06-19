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
}
