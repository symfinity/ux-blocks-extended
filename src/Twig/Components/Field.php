<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Field', template: '@UxBlocksExtended/components/Field.html.twig')]
final class Field
{
    public string $orientation = 'vertical';
}
