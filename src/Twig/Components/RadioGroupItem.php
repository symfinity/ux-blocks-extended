<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('RadioGroup:Item', template: '@UxBlocksExtended/components/RadioGroup/Item.html.twig')]
final class RadioGroupItem
{
    public string $value = '';

    public bool $disabled = false;
}
