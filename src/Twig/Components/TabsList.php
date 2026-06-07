<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Tabs:List', template: '@UxBlocksExtended/components/Tabs/List.html.twig')]
final class TabsList
{
    public string $orientation = 'horizontal';
}
