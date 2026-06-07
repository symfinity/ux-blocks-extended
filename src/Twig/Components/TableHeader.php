<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Table:Header', template: '@UxBlocksExtended/components/_shared/thead_slot.html.twig')]
final class TableHeader
{
}
