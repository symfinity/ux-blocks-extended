<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class EmptyIconTest extends ComponentTestCase
{
    #[Test]
    public function mediaWellRendersCenterIconPart(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty:Media', [
            'icon' => 'lucide:inbox',
        ]);

        self::assertStringContainsString('data-ui-role="empty-media"', $html);
        self::assertStringContainsString('data-ui-part="icon"', $html);
    }

    #[Test]
    public function headlessKernelRendersEmptyIconPartWithoutUxIcons(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty:Media', [
            'icon' => 'lucide:inbox',
        ]);

        self::assertStringContainsString('data-ui-part="icon"', $html);
    }
}
