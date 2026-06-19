<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class EmptyTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty');

        $this->assertRootAttributes($html, 'empty', 'blocks.ext.empty');
        self::assertStringNotContainsString('data-ui-media=', $html);
        self::assertStringNotContainsString('data-action-url=', $html);
    }

    #[Test]
    public function contentFragmentRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty:Content');

        $this->assertRootAttributes($html, 'empty-content', 'blocks.ext.empty.content');
    }
}
