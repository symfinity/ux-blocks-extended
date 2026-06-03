<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('HoverCard', template: '@UxBlocksExtended/components/HoverCard.html.twig')]
final class HoverCard
{
    public int $openDelay = 200; public int $closeDelay = 100;
}

