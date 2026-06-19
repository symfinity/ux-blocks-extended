<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class DialogNativeTest extends ComponentTestCase
{
    #[Test]
    public function dialogUsesNativeModalMarkup(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Dialog', [], '<p>Body</p>');

        self::assertStringContainsString('<dialog', $html);
        self::assertStringContainsString('data-ui-role="modal"', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.ext.dialog"', $html);
        self::assertStringContainsString('class="ui-dialog"', $html);
        self::assertStringContainsString('id="dialog-', $html);
        self::assertDoesNotMatchRegularExpression('/data-controller="/', $html);
    }
}
