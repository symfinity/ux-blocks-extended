<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sheet', template: '@UxBlocksExtended/components/Sheet.html.twig')]
final class Sheet
{
    public string $side = 'right';
}

