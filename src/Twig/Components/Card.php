<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Card', template: '@UxBlocksExtended/components/Card.html.twig')]
final class Card
{
    public string $size = 'default';
}
