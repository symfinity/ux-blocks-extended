<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StackedLayoutInteractive:NavItem', template: '@UxBlocksExtended/components/StackedLayoutInteractive/NavItem.html.twig')]
final class StackedLayoutInteractiveNavItem
{
    public string $panel = '';
}
