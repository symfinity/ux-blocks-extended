<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('DataTableChrome', template: '@UxBlocksExtended/components/DataTableChrome.html.twig')]
final class DataTableChrome
{
    use ResolvesSurfaceSubstrate;

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }
}
