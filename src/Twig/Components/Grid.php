<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Grid', template: '@UxBlocksExtended/components/Grid.html.twig')]
final class Grid
{
    public ?int $columns = null;
}
