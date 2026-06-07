<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Card:Header', template: '@UxBlocksExtended/components/_shared/header_slot.html.twig')]
final class CardHeader
{
}
