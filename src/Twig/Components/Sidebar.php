<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar', template: '@UxBlocksExtended/components/Sidebar.html.twig')]
final class Sidebar
{
    public string $side = 'left';

}
