<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StackedLayoutInteractive', template: '@UxBlocksExtended/components/StackedLayoutInteractive.html.twig')]
final class StackedLayoutInteractive
{
    public string $defaultPanel = '';
}
