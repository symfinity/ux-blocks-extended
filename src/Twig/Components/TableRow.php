<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Table:Row', template: '@UxBlocksExtended/components/_shared/tr_slot.html.twig')]
final class TableRow
{
}
