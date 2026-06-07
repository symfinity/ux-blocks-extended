<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Card:Content', template: '@UxBlocksExtended/components/_shared/div_slot.html.twig')]
final class CardContent
{
}
