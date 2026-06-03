<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Menubar:Content', template: '@UxBlocksExtended/components/Menubar/Content.html.twig')]
final class MenubarContent
{
}
