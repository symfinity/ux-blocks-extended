<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Field:Label', template: '@UxBlocksExtended/components/_shared/div_slot.html.twig')]
final class FieldLabel
{
}
