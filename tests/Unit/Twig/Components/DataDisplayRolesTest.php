<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class DataDisplayRolesTest extends ComponentTestCase
{
    #[Test]
    public function dataTableChromeRootFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('DataTableChrome');

        $this->assertRootAttributes($html, 'data-table-chrome', 'blocks.ext.data-table-chrome');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--data-table-chrome"', $html);
    }

    #[Test]
    public function carouselInteractiveIncludesViewportAndControls(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('CarouselInteractive');

        $this->assertRootAttributes($html, 'carousel-interactive', 'blocks.ext.carousel-interactive');
        self::assertStringContainsString('carousel-interactive-viewport', $html);
        self::assertStringContainsString('carousel-interactive#prev', $html);
        self::assertStringContainsString('carousel-interactive#next', $html);
    }

    #[Test]
    public function resizableRootFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Resizable');

        $this->assertRootAttributes($html, 'resizable', 'blocks.ext.resizable');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--resizable"', $html);
    }

    #[Test]
    public function toastRootFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Toast');

        $this->assertRootAttributes($html, 'toast', 'blocks.ext.toast');
        self::assertStringContainsString('aria-live="polite"', $html);
    }
}
