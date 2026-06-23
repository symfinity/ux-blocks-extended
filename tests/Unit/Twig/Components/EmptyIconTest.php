<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class EmptyIconTest extends ComponentTestCase
{
    #[Test]
    public function mediaRegionRendersCenterIconPart(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Media', [
            'icon' => 'lucide:inbox',
        ]);

        self::assertStringContainsString('data-ui-part="media"', $html);
        self::assertStringContainsString('data-ui-part="icon"', $html);
    }
}
