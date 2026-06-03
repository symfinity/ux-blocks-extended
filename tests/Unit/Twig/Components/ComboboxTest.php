<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class ComboboxTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Combobox');

        $this->assertRootAttributes($html, 'combobox', 'blocks.ext.combobox');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--combobox"', $html);
    }
}
