<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('ContextMenu:Item', template: '@UxBlocksExtended/components/ContextMenu/Item.html.twig')]
final class ContextMenuItem
{
    public bool $disabled = false;
}

