<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class PopoverNativeTest extends ComponentTestCase
{
    #[Test]
    public function popoverUsesNativePopoverMarkup(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Popover', [], '<p>Panel</p>');

        self::assertStringContainsString('popover', $html);
        self::assertStringContainsString('data-ui-role="popover"', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.ext.popover"', $html);
        self::assertStringContainsString('class="ui-popover"', $html);
        self::assertStringContainsString('id="popover-', $html);
        self::assertDoesNotMatchRegularExpression('/data-controller="/', $html);
    }
}
