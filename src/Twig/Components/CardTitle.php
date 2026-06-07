<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Card:Title', template: '@UxBlocksExtended/components/_shared/h3_slot.html.twig')]
final class CardTitle
{
}
