<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Grid:Cell', template: '@UxBlocksExtended/components/Grid/Cell.html.twig')]
final class GridCell
{
    public ?int $span = null;
}
