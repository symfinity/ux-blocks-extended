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
    }

    #[Test]
    public function scalarTitleAndDescriptionRenderInHeaderRegion(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty', [
            'title' => 'Nothing here',
            'description' => 'Try another filter',
        ]);

        self::assertStringContainsString('data-ui-part="header"', $html);
        self::assertStringContainsString('Nothing here', $html);
        self::assertStringContainsString('Try another filter', $html);
    }

    #[Test]
    public function softAppearanceEmitsDataUiAppearance(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty', [
            'appearance' => 'soft',
            'title' => 'Nothing here',
        ]);

        self::assertStringContainsString('data-ui-appearance="soft"', $html);
    }

    #[Test]
    public function outlineAppearanceOmitsDataUiAppearance(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Empty', ['title' => 'Nothing here']);

        self::assertStringNotContainsString('data-ui-appearance=', $html);
    }
}
