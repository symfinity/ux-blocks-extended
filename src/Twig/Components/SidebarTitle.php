<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar:Title', template: '@UxBlocksExtended/components/Sidebar/Title.html.twig')]
final class SidebarTitle
{
}
