<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Menubar:Item', template: '@UxBlocksExtended/components/Menubar/Item.html.twig')]
final class MenubarItem
{
    public bool $disabled = false;
}
