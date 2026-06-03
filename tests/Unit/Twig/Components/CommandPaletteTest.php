<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class CommandPaletteTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('CommandPalette', [
            'placeholder' => 'Find…',
            'openHotkey' => 'k',
        ]);

        $this->assertRootAttributes($html, 'command-palette', 'blocks.ext.command-palette');
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--command-palette"', $html);
        self::assertStringContainsString('role="dialog"', $html);
    }

    #[Test]
    public function fallbackCommandsEncodeAsStimulusValue(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('CommandPalette', [
            'fallbackCommands' => [
                ['id' => 'demo.home', 'title' => 'Home', 'url' => '/'],
            ],
        ]);

        self::assertStringContainsString('data-symfony--ux-blocks-extended--command-palette-fallback-commands-value', $html);
        self::assertStringContainsString('demo.home', $html);
    }
}
