<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StackedLayoutInteractive:Panel', template: '@UxBlocksExtended/components/StackedLayoutInteractive/Panel.html.twig')]
final class StackedLayoutInteractivePanel
{
    public string $panel = '';
}
