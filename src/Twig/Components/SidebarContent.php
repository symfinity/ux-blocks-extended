<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar:Content', template: '@UxBlocksExtended/components/Sidebar/Content.html.twig')]
final class SidebarContent
{
}
