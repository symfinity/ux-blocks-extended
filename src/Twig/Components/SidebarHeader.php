<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar:Header', template: '@UxBlocksExtended/components/Sidebar/Header.html.twig')]
final class SidebarHeader
{
}
