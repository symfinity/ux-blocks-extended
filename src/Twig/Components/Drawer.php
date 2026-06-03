<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Drawer', template: '@UxBlocksExtended/components/Drawer.html.twig')]
final class Drawer
{
    public string $side = 'bottom';
}

