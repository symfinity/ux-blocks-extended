<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('CommandPalette:Item', template: '@UxBlocksExtended/components/CommandPalette/Item.html.twig')]
final class CommandPaletteItem
{
}
