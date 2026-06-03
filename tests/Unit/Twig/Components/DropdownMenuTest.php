<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class DropdownMenuTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('DropdownMenu');

        $this->assertRootAttributes($html, 'dropdown-menu', 'blocks.ext.dropdown-menu');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--dropdown-menu"', $html);
    }
}
