<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class DatePickerTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('DatePicker');

        $this->assertRootAttributes($html, 'date-picker', 'blocks.ext.date-picker');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--date-picker"', $html);
    }
}
