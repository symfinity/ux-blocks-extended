<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class TabsTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Tabs', ['defaultValue' => 'a', 'orientation' => 'horizontal']);

        $this->assertRootAttributes($html, 'tabs', 'blocks.ext.tabs');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--tabs"', $html);
    }
}
