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

    #[Test]
    public function namedDialogIdIsKept(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Dialog', ['dialogId' => 'my-dialog']);

        self::assertStringContainsString('id="my-dialog"', $html);
    }

    #[Test]
    public function emptyDialogIdIsGenerated(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Dialog', ['dialogId' => '']);

        self::assertMatchesRegularExpression('/id="dialog-[0-9a-f]{8}"/', $html);
    }

    #[Test]
    public function twoUnnamedDialogsGetDifferentIds(): void
    {
        self::bootKernel();
        $first = $this->renderComponent('Dialog');
        $second = $this->renderComponent('Dialog');

        preg_match('/id="([^"]+)"/', $first, $firstId);
        preg_match('/id="([^"]+)"/', $second, $secondId);

        self::assertNotSame($firstId[1] ?? '', $secondId[1] ?? '');
    }
}
