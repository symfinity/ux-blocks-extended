<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Combobox:Item', template: '@UxBlocksExtended/components/Combobox/Item.html.twig')]
final class ComboboxItem
{
}
