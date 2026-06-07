<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Field:Description', template: '@UxBlocksExtended/components/_shared/p_slot.html.twig')]
final class FieldDescription
{
}
