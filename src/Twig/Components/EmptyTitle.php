<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Empty:Title', template: '@UxBlocksExtended/components/EmptyTitle.html.twig')]
final class EmptyTitle
{
}
